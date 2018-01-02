<?php

namespace App\Http\Controllers;

use App\Cosbis\Repositories\Criterias\Events\{OrderBy,Where,WithCommentCount};
use App\Cosbis\Repositories\EventRepository;
use App\Cosbis\Repositories\UserRepository;
use App\Http\Requests\Students\StudentUpdateAccountRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    private $userRepository, $eventRepository;

    public function __construct(UserRepository $userRepository, EventRepository $eventRepository)
    {
        $this->userRepository= $userRepository;
        $this->eventRepository= $eventRepository;
    }

    public function index()
    {
        $events= \App\Event::where("status", "=", "approved")->paginate(5, ['*'], 'events');

        $now= Carbon::now()->format('Y-m-d');
        $week_ago= Carbon::now()->subDays(7)->format('Y-m-d');
        $week_from_now = Carbon::now()->addDays(7)->format('Y-m-d');

        $events= $this->eventRepository->pushCriteria(new Where([['date', '>=', $week_ago], ['date', '<=', $week_from_now],['status', '=', 'approved']]))
            ->pushCriteria(new OrderBy('date', 'asc'))
            ->all();
        $upcomming_events= $this->eventRepository->clear()
            ->pushCriteria(new Where(([['date', '>', $now], ['status', '=', 'approved']])))
            ->pushCriteria(new OrderBy('date', 'asc'))
            ->all();
        $new_events= $this->eventRepository->clear()
            ->pushCriteria(new Where(([['created_at', '>=', $week_ago], ['status', '=', 'new']])))
            ->pushCriteria(new OrderBy('date', 'asc'))
            ->all();
        $relevant_events= $this->eventRepository->clear()
            ->pushCriteria(new Where([['status', '<>', 'rejected']]))
            ->pushCriteria(new WithCommentCount())
            ->pushCriteria(new OrderBy('views', 'desc'))
            ->pushCriteria(new OrderBy('comments_count', 'desc'))
            ->all();

        return view('accounts.index', compact('events', 'events', 'upcomming_events', 'new_events', 'relevant_events'));
    }

    public function edit()
    {
        return view('accounts.edit');
    }

    public function update(StudentUpdateAccountRequest $request)
    {
        $user= $this->userRepository->find(auth()->user()->id);
        $data=array(
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        );

        $user->update($data);

        return redirect()->back();
    }

    public function password()
    {
        return view('auth.passwords.change');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'password_old' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = auth()->user();
        if (!(Hash::check($request->password_old, $user->password))) {
            $request->session()->flash('failure', 'Incorrect Password');
            return back();
        }

        //Change the password
        if ($user->fill([
            'password' => Hash::make($request->password)
        ])->save()) {
            $request->session()->flash('success', 'Your password has been changed.');
            return back();
        }
    }
}
