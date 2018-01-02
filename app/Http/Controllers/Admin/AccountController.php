<?php

namespace App\Http\Controllers\Admin;

use App\Cosbis\Repositories\UserRepository;
use App\Cosbis\TokenGenerator\UserTokenGenerator;
use App\Craftbeer\Filetransfer\Classes\AccountImageTransferable;
use App\Events\WelcomeVerification;
use App\Http\Requests\Admin\AdminCreateAccountRequest;
use App\Http\Requests\Admin\AdminUpdateAccountRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AccountController extends Controller
{
    private $accountImageHandler, $tokenGenerator, $userRepository;

    public function __construct(AccountImageTransferable $accountImageTransferable, UserTokenGenerator $tokenGenerator, UserRepository $userRepository)
    {
        $this->accountImageHandler= $accountImageTransferable;
        $this->tokenGenerator= $tokenGenerator;
        $this->userRepository= $userRepository;
    }

    public function index()
    {
        $accounts=\App\User::where('role_id','!=','1')->with(['events','events.organization'])->get();

        foreach($accounts as $account){
            $account->created_at_formatted= $account->created_at->toFormattedDateString();
            $account->updated_at_formatted= $account->updated_at->toFormattedDateString();
        }

        return view('admin.students.index',compact('accounts'));
    }

    public function show($user)
    {
        $account= $this->userRepository->find($user);
        return view('admin.students.show',compact('account'));
    }

    public function edit($user)
    {
        $roles=\App\Role::where('id', '!=','1')->get();
        $account= $this->userRepository->find($user);
        return view('admin.students.edit',compact('account','roles'));
    }

    public function update(AdminUpdateAccountRequest $request,$user)
    {
        $account= $this->userRepository->find($user);
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

    public function store(AdminCreateAccountRequest $request)
    {
        $token= $this->tokenGenerator->getToken();
        $img= '/img/account_img/default.png';
        if(request('img') !== null)
            $img= $this->accountImageHandler->move(request('img'));

        if($user = \App\User::create([
            'student_number' => $request['student_number'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'token' => $token,
            'img' => $img,
            'role_id' => $request['role'],
            'password' => bcrypt('asdasd'),
        ])){
            event(new WelcomeVerification($user));
            return redirect()->back()->with('success');
        }

        return redirect()->back()->with('error');
    }

    public function destroy()
    {
        if($user = $this->userRepository->find(request('id'))){
            $user->delete();
        }

        return back();
    }
}
