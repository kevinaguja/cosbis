<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Cosbis\Filters\AnnouncementFilters;
use Carbon\Carbon;

class ElectionController extends Controller
{
    //
    public function index(AnnouncementFilters $filters)
    {
        $now= Carbon::now()->format('Y');
        $candidates= Candidate::whereYear('created_at', '=', $now)->with(['user', 'election_party'])->get();

        return view('election.vote', compact('candidates'));
    }
}
