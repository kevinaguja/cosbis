<?php

namespace App\Http\Controllers\Admin\Election;

use App\Cosbis\Filters\ElectionFilters;
use App\Cosbis\Repositories\CandidateRepository;
use App\Cosbis\Repositories\Criterias\Events\OrderBy;
use App\Cosbis\Repositories\PartyRepository;
use Carbon\Carbon;
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

    public function index(ElectionFilters $filters)
    {
        if(Request('year') == null){
            $now = Carbon::now()->format('Y');
            $parties = \App\Party::whereYear('created_at', '=', $now)
                ->orWhere('id', '=', '1')
                ->get();
        }
        $parties=\App\Party::filter($filters)->get();
        $candidates = $this->candidateRepository
            ->pushCriteria(new OrderBy('position_id', 'asc'))
            ->all();
        return view('election.index', compact('parties', 'candidates'));
    }
}
