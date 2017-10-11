<?php

namespace App\Cosbis\Repositories;

class AnnouncementRepository extends Repository
{

    public function model()
    {
        return \App\Announcement::class;
    }
}