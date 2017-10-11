<?php

namespace App\Http\Controllers;

use App\Cosbis\Repositories\EventCommentRepository;
use Illuminate\Http\Request;

class EventCommentController extends Controller
{
    private $eventCommentRepository;

    public function __construct(EventCommentRepository $eventCommentRepository)
    {
        $this->eventCommentRepository= $eventCommentRepository;
    }
    public function store($id)
    {
        if($this->eventCommentRepository->create([
           'user_id' => auth()->user()->id,
           'event_id' => $id,
           'comment' => request('comment')
        ]))
            return back()->with('success', 'Comment Posted!');

        return back()->with('error', 'There was an error in posting your comment.');
    }
}
