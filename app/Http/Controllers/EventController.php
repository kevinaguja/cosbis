<?php

namespace App\Http\Controllers;

use App\Craftbeer\Filetransfer\Classes\PhotoTransferable;
use App\Http\Requests\events\StoreEventRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    //
    public function index()
    {
        $events= \App\Event::where('status', '=', 'approved')->paginate(5);

        return view('events.index', compact('events'));
    }

    public function calendar()
    {
        $now= Carbon::now()->format('Y-m-d');
        $week_ago= Carbon::now()->subDays(7)->format('Y-m-d');
        $week_from_now = Carbon::now()->addDays(7)->format('Y-m-d');

        $events= \App\Event::where([['date', '>=', $week_ago], ['status', '=', 'approved']])
            ->orderBy('date', 'asc')
            ->get();
        $upcomming_events= \App\Event::where([['date', '>', $now], ['status', '=', 'approved']])
            ->orderBy('date', 'asc')
            ->get();
        $new_events= \App\Event::where([['created_at', '>=', $week_ago], ['status', '=', 'new']])
            ->orderBy('date', 'asc')
            ->get();

        foreach($events as $event){
            $event->date= Carbon::parse($event->date)->toDayDateTimeString();
        }
        foreach($upcomming_events as $event){
            $event->date= Carbon::parse($event->date)->toDayDateTimeString();
        }
        foreach($new_events as $event){
            $event->date= Carbon::parse($event->date)->toDayDateTimeString();
        }

        return view('events.calendar', compact('events', 'upcomming_events', 'new_events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function show($id)
    {
        $event= \App\Event::where("id", "=", $id)->first();

        return view('events.show', compact('event'));
    }

    public function store(StoreEventRequest $request)
    {
        $img= '/public/img/events/default.jpg';
        if(request('img') !== null)
            $img= PhotoTransferable::move(request('img'));

        if(\App\Event::create(array_merge(request()->all(), ["img"=>$img, "status"=> $this->getStatus(), "user_id"=>auth()->user()->id])));
            return back()->with('success', 'Event Successfully registered');

        return back()->with('error', 'Unable to register event, Please contact your administrator to fix this issue');
    }

    private function getStatus()
    {
        switch(auth()->user()->role_id){
            case(3):
                return "new";
                break;
            case (1 || 2):
                return "approved";
        }
    }
}
