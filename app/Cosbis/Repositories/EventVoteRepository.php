<?php

namespace App\Cosbis\Repositories;

class EventVoteRepository extends Repository
{

    public function model()
    {
        return \App\EventVote::class;
    }
}