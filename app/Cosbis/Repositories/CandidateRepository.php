<?php

namespace App\Cosbis\Repositories;

class CandidateRepository extends Repository
{

    public function model()
    {
        return \App\Candidate::class;
    }
}