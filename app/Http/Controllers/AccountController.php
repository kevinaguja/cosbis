<?php

namespace App\Http\Controllers;

use App\Cosbis\Repositories\Criterias\Events\{OrderBy,Where,WithCommentCount};
use App\Cosbis\Repositories\EventRepository;
use App\Cosbis\Repositories\UserRepository;
use App\Cosbis\Filetransfer\Classes\AccountImageTransferable;
use App\Event;
use App\Http\Requests\Students\StudentUpdateAccountRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

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
        $official_events=[];
        $rejected_events=[];
        $new_events=[];
        $my_events=[];
        foreach(range(1,12) as $month){
            $official_events[]= Event::where('status', 'approved')->whereYear('date', '=', now()->year)->whereMonth('date', '=', $month)->count();
            $rejected_events[]= Event::where('status', 'rejected')->whereYear('date', '=', now()->year)->whereMonth('date', '=', $month)->count();
            $new_suggestions[]= Event::where('status', 'new')->whereYear('date', '=', now()->year)->whereMonth('date', '=', $month)->count();
            $my_events[]= Event::where('user_id', auth()->user()->student_number)->whereYear('date', '=', now()->year)->whereMonth('date', '=', $month)->count();
        }

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

        return view('accounts.index', compact('events', 'events', 'upcomming_events', 'new_events', 'relevant_events', 'official_events', 'rejected_events', 'new_suggestions', 'my_events'));
    }

    public function edit()
    {
        return view('accounts.edit');
    }

    public function update(StudentUpdateAccountRequest $request, AccountImageTransferable $fileTransfer)
    {
        $user= $this->userRepository->find(auth()->user()->id);

        $img= auth()->user()->img;
        if(request('img') !== null)
            $img= $fileTransfer->move(request('img'));

        $data=array(
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role_id' => $request['role'],
            'address' => $request['address'],
            'birthdate' => $request['birthdate'],
            'img' => $img,
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

    public function suspendedAccount()
    {
            return view('auth.suspendedaccount');
    }

    public function test()
    {
    Mail::send(['text'=> 'mail'],['name', 'earl'], function($message){
        $message->to('earlaguja@gmail.com', 'To Earl')->subject('test');
        $message->from('kevinaguja@yahoo.com', 'Earl');
    });
    }
}
