<?php

namespace App\Http\Controllers;

use App\Cosbis\Filters\AnnouncementFilters;

class ElectionController extends Controller
{
    //
    public function index(AnnouncementFilters $filters)
    {
        return view('election.vote');
    }
}
