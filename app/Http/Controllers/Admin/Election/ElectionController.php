<?php

namespace App\Http\Controllers\Admin\Election;

use App\Cosbis\Repositories\CandidateRepository;
use App\Cosbis\Repositories\PartyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ElectionController extends Controller
{
    private $partyRepository, $candidateRepository;
    public function __construct(PartyRepository $partyRepository, CandidateRepository $candidateRepository)
    {
        $this->partyRepository=$partyRepository;
        $this->candidateRepository=$candidateRepository;
    }

    public function index()
    {
        $candidates=$this->candidateRepository->all();
        $parties=$this->partyRepository->paginate('5');
        return view('election.index',compact('parties','candidates'));
    }
}
