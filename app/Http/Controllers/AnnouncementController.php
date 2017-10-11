<?php

namespace App\Http\Controllers;

use App\Cosbis\Filters\AnnouncementFilters;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function index(AnnouncementFilters $filters)
    {
        $announcements= \App\Announcement::filter($filters)->paginate(5);

        return view('announcements.index', compact('announcements'));
    }
}
