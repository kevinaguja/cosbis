<?php

namespace App\Cosbis\TokenGenerator;

use Illuminate\Support\Str;

class UserTokenGenerator extends TokenGenerator
{
    public function model()
    {
        return \App\User::class;
    }
}