<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //
    public function index()
    {
        $announcements= \App\Announcement::paginate(5);

        return view('announcements.index', compact('announcements'));
    }
}
