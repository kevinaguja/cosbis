<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventCommentController extends Controller
{
    //
    public function store($id)
    {
        if(\App\EventComment::create([
           'user_id' => auth()->user()->id,
           'event_id' => $id,
           'comment' => request('comment')
        ]))
            return back()->with('success', 'Comment Posted!');

        return back()->with('error', 'There was an error in posting your comment.');
    }
}
