<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuggestedEventController extends Controller
{
    //
    public function index()
    {
        $events= \App\Event::where('status', '=', 'new')->with('user')->get();

        return view('events.suggestedEvents.index', compact('events'));
    }

    public function show()
    {
        if(request('id')===null){
            $events= auth()->user()->events;

            return view('events.suggestedEvents.show', compact('events'));
        }
    }
}
