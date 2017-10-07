<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SuggestedEventController extends Controller
{
    //
    public function index()
    {
        $events= \App\Event::where('status', '=', 'new')->with('user')->orderBy('created_at', 'desc')->get();

        foreach($events as $event){
            $event->date= Carbon::parse($event->date)->toFormattedDateString();
            $event->hasVoted= $event->checkForVotes();
        }

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
