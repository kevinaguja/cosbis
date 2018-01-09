<?php

namespace App\Cosbis\Repositories;

class PartyRepository extends Repository
{

    public function model()
    {
        return \App\Party::class;
    }
}