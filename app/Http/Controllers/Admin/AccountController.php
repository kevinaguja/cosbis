<?php

namespace App\Http\Controllers\Admin;

use App\Cosbis\TokenGenerator\TokenGenerator;
use App\Events\WelcomeVerification;
use App\Http\Requests\Admin\AdminCreateAccountRequest;
use App\Http\Requests\Admin\AdminUpdateAccountRequest;
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

    public function update(AdminUpdateAccountRequest $request,$user)
    {
        $account= \App\User::find($user);
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

    public function create()
    {
        $roles=\App\Role::where('id', '!=','1')->get();
        return view('admin.students.create',compact('roles'));
    }

    public function store(AdminCreateAccountRequest $request, TokenGenerator $tokenGenerator)
    {
        $token= $tokenGenerator->getToken();
        if($user = \App\User::create([
            'student_number' => $request['student_number'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'token' => $token,
            'img' => '/img/account_img/example.jpg',
            'role_id' => $request['role'],
            'password' => bcrypt('asdasd'),
        ])){
            event(new WelcomeVerification($user));
            return redirect()->back()->with('success');
        }

        return redirect()->back()->with('error');
    }
}
