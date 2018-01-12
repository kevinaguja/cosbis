<?php

namespace App\Http\Controllers\Admin\Election;

use App\Candidate;
use App\Cosbis\Filters\ElectionFilters;
use App\Cosbis\Repositories\CandidateRepository;
use App\Cosbis\Repositories\PartyRepository;
use App\ElectionLog;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class ElectionController extends Controller
{
    private $partyRepository, $candidateRepository;

    public function __construct(PartyRepository $partyRepository, CandidateRepository $candidateRepository)
    {
        $this->partyRepository = $partyRepository;
        $this->candidateRepository = $candidateRepository;
    }

    public function index(ElectionFilters $filters)
    {
        $election_log = ElectionLog::latest()->first();
        $parties = \App\Party::filter($filters)->get();

        $now = Request('year');
        if (Request('year') == null) {
            $now = Carbon::now()->format('Y');
            $parties = \App\Party::whereYear('created_at', '=', $now)
                ->orWhere('id', '=', '1')
                ->get();
        }
        $candidates = Candidate::whereYear('created_at', '=', $now)->with(['user', 'election_party'])->get();
        return view('election.index', compact('parties', 'candidates', 'election_log'));
    }


    public function openElection()
    {
        if(ElectionLog::create(["date_ended" => null]))
            return back()->with('success', 1);

        return back()->with('error', 'There was an error trying to start the elections');
    }

    public function closeElection()
    {
        $election_log= ElectionLog::latest()->first();
        $election_log->date_ended= now();
        $election_log->save();

        return back()->with('success', 0);
    }
}
