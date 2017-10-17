<?php

namespace App\Http\Controllers;

use App\Cosbis\Filters\EventFilters;
use App\Cosbis\Repositories\Criterias\Events\OrderBy;
use App\Cosbis\Repositories\Criterias\Events\Where;
use App\Cosbis\Repositories\Criterias\Events\WithCommentCount;
use App\Cosbis\Repositories\EventRepository;
use App\Cosbis\Repositories\EventVoteRepository;
use App\Craftbeer\Filetransfer\Classes\AccountImageTransferable;
use App\Http\Requests\events\StoreEventRequest;
use Carbon\Carbon;

class EventController extends Controller
{
    private $eventRepository, $eventVoteRepository;

    public function __construct(EventRepository $eventRepository, EventVoteRepository $eventVoteRepository)
    {
        $this->eventRepository= $eventRepository;
        $this->eventVoteRepository= $eventVoteRepository;
    }

    //
    public function index(EventFilters $filters)
    {
        $now= Carbon::now();

        $events= $this->eventRepository->pushCriteria(new Where([['restriction','=', null], ['date', '>=', $now]]))
            ->pushCriteria(new OrderBy('date', 'asc'))
            ->filter($filters)
            ->paginate(5);

        return view('events.index', compact('events'));
    }

    public function calendar()
    {
        $now= Carbon::now()->format('Y-m-d');
        $week_ago= Carbon::now()->subDays(7)->format('Y-m-d');
        $week_from_now = Carbon::now()->addDays(7)->format('Y-m-d');

        $events= $this->eventRepository->pushCriteria(new Where([['date', '>=', $week_ago], ['date', '<=', $week_from_now],['status', '=', 'approved']]))
            ->pushCriteria(new OrderBy('date', 'asc'))
            ->all();
        $upcomming_events= $this->eventRepository->clear()
            ->pushCriteria(new Where(([['date', '>', $now], ['status', '=', 'approved']])))
            ->pushCriteria(new OrderBy('date', 'asc'))
            ->all();
        $new_events= $this->eventRepository->clear()
            ->pushCriteria(new Where(([['created_at', '>=', $week_ago], ['status', '=', 'new']])))
            ->pushCriteria(new OrderBy('date', 'asc'))
            ->all();
        $relevant_events= $this->eventRepository->clear()
            ->pushCriteria(new Where([['status', '<>', 'rejected']]))
            ->pushCriteria(new WithCommentCount())
            ->pushCriteria(new OrderBy('views', 'desc'))
            ->pushCriteria(new OrderBy('comments_count', 'desc'))
            ->all();

        return view('events.calendar', compact('events', 'upcomming_events', 'new_events', 'relevant_events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function show($id)
    {
        if(!($event= $this->eventRepository->pushCriteria(new Where([['restriction', '=', null]]))->find($id))){
            return redirect('/events');
        }
        if(!($event->user_id === auth()->user()->id))
            $event->views++;
        $event->save();
        $comments= $event->comments()->orderBy('created_at', 'desc')->paginate(10);

        return view('events.show', compact('event', 'comments'));
    }

    public function store(StoreEventRequest $request)
    {
        dd(request()->all());
        $img= '/public/img/events/default.jpg';
        if(request('img') !== null)
            $img= AccountImageTransferable::move(request('img'));

        if($this->eventRepository->create(array_merge(request()->all(), ["img"=>$img, "status"=> $this->getStatus(), "user_id"=>auth()->user()->id])));
            return back()->with('success', 'Event Successfully registered');

        return back()->with('error', 'Unable to register event, Please contact your administrator to fix this issue');
    }

    public function vote($id)
    {
        if(!(($this->eventRepository->find($id))->checkForVotes())){
            $this->eventVoteRepository->create([
                'event_id' => $id,
                'user_id' => auth()->user()->id,
                'vote' => request('vote')
            ]);

            return back()->with('success', 'Successfully Voted!');
        }

        return back()->with('error', 'You have already submitted your vote for this suggestion!');


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
