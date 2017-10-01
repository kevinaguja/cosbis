<?php

namespace App\Http\Controllers;

use App\Craftbeer\Filetransfer\Classes\PhotoTransferable;
use App\Http\Requests\events\StoreEventRequest;

class EventController extends Controller
{
    //
    public function index()
    {
            $events= \App\Event::where('status', '=', 'approved')->get();

        return view('events.index', compact('events'));
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
