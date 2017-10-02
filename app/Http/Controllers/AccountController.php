<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index()
    {
        $events= \App\Event::where("status", "=", "approved")->paginate(2);
        $announcements= \App\Announcement::all();
        $news= \App\News::all();

        return view('accounts.index', compact('events', 'announcements', 'news'));
    }

    public function edit()
    {
        return view('accounts.edit');
    }
}
