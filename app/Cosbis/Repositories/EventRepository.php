<?php

namespace App\Cosbis\Repositories;

class EventRepository extends Repository
{

    public function model()
    {
        return \App\Event::class;
    }
}