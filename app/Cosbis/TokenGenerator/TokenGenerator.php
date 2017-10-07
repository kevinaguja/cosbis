<?php

namespace App\Cosbis\TokenGenerator;

use Illuminate\Support\Str;

class TokenGenerator
{
    public function getToken()
    {
        do{
            $token= $this->generateToken();
        }while($this->checkForDuplicate($token));

        return $token;
    }

    private function generateToken()
    {
        return Str::random(60);
    }

    private function checkForDuplicate($token_param)
    {
        return \App\User::where('token', '=' , $token_param)->exists();
    }
}