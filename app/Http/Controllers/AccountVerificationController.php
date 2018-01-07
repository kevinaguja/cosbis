<?php

namespace App\Http\Controllers;

use App\Cosbis\TokenGenerator\UserTokenGenerator;
use App\Events\ResendVerification;
use Illuminate\Http\Request;

class AccountVerificationController extends Controller
{
    //
    public function verifyAccount($token)
    {
        if(strcmp($token, auth()->user()->token)===0){
            auth()->user()->is_verified= 1;
            auth()->user()->token= null;
            auth()->user()->save();
            return redirect('/profile');
        }

            return redirect('/verify');
    }

    public function verify()
    {
        return view('auth.resendVerification');
    }

    public function resendVerification(UserTokenGenerator $tokenGenerator)
    {
        $token=$tokenGenerator->getToken();
        if($user= auth()->user()->update(['token'=>$token])){
            event(new ResendVerification(auth()->user()));
        }

        return back();
    }
}
