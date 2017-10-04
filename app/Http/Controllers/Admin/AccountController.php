<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        $accounts=\App\User::where('role_id','!=','1')->get();
        return view('admin.students.index',compact('accounts'));
    }

    public function show($user)
    {
        $account=\App\User::find($user);
        return view('admin.students.show',compact('account'));
    }

    public function edit($user)
    {
        $roles=\App\Role::where('id', '!=','1')->get();
        $account=\App\User::find($user);
        return view('admin.students.edit',compact('account','roles'));
    }

    public function update(Request $request,$user)
    {
        $account= \App\User::find($user);
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$request['id'],
        ]);

        $data=array(
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role_id' => $request['role'],
        );
        $account->update($data);

        return redirect()->back();
    }
}
