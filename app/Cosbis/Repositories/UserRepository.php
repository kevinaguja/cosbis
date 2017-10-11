<?php

namespace App\Cosbis\Repositories;

class UserRepository extends Repository
{

    public function model()
    {
        return \App\User::class;
    }
}