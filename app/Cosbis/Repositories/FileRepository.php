<?php

namespace App\Cosbis\Repositories;

class FileRepository extends Repository
{

    public function model()
    {
        return \App\File::class;
    }
}