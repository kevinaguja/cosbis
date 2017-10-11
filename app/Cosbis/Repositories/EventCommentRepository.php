<?php

namespace App\Cosbis\Repositories;

class EventCommentRepository extends Repository
{

    public function model()
    {
        return \App\EventComment::class;
    }
}