<?php

namespace App\Http\Controllers;

use App\Http\Requests\Students\StudentUpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class AccountController extends Controller
{
    //
    public function index()
    {
        $events= \App\Event::where("status", "=", "approved")->paginate(5, ['*'], 'events');
        $announcements= \App\Announcement::paginate(10, ['*'], 'announcements');
        $news= \App\News::all();

        return view('accounts.index', compact('events', 'announcements', 'news'));
    }

    public function edit()
    {
        return view('accounts.edit');
    }

    public function update(StudentUpdateAccountRequest $request)
    {
        $user= \App\User::find(auth()->user()->id);
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

    public function destroy()
    {
        if($user = \App\User::find(request('id'))){
            $user->delete();
        }

        return back();
    }
}
