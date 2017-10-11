<?php

namespace App\Http\Controllers;

use App\Cosbis\Repositories\Criterias\Events\{OrderBy, Where, With};
use App\Cosbis\Repositories\EventRepository;

class SuggestedEventController extends Controller
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository= $eventRepository;
    }

    public function index()
    {
        $events= $this->eventRepository->pushCriteria(new Where([['status', '=', 'new'], ['restriction', '=', null]]))
            ->pushCriteria(new With('user'))
            ->pushCriteria(new With('organization'))
            ->pushCriteria(new orderBy('created_at', 'desc'))
            ->all();

        foreach($events as $event){
            $event->formattedDate= $event->date->toFormattedDateString();
            $event->hasVoted= $event->checkForVotes();
        }

        return view('events.suggestedEvents.index', compact('events'));
    }

    public function show()
    {
        if(request('id')===null){
            $events= auth()->user()->events()->withCount('comments')->get();

            return view('events.suggestedEvents.show', compact('events'));
        }
    }
}
