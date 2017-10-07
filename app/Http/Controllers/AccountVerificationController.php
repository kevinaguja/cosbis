<?php

namespace App\Http\Controllers;

use App\Cosbis\TokenGenerator\TokenGenerator;
use App\Events\ResendVerification;
use Illuminate\Http\Request;

class AccountVerificationController extends Controller
{
    //
    public function verifyAccount($token)
    {
        if(strcmp($token, auth()->user()->token)===0){
            auth()->user()->is_verified= 1;
            auth()->user()->save();
            return redirect('/profile');
        }

            return redirect('/verify');
    }

    public function verify()
    {
        return view('auth.resendVerification');
    }

    public function resendVerification(TokenGenerator $tokenGenerator)
    {
        $token=$tokenGenerator->getToken();
        if($user= auth()->user()->update(['token'=>$token])){
            event(new ResendVerification(auth()->user()));
        }

        return back();
    }
}
