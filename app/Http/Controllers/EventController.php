<?php

namespace App\Http\Controllers;

use App\Cosbis\Filters\EventFilters;
use App\Cosbis\Repositories\Criterias\Events\OrderBy;
use App\Cosbis\Repositories\Criterias\Events\Where;
use App\Cosbis\Repositories\EventRepository;
use App\Cosbis\Repositories\EventVoteRepository;
use App\Cosbis\Repositories\OrganizationRepository;
use App\Cosbis\Filetransfer\Classes\EventImageTransferable;
use App\Event;
use App\Http\Requests\events\StoreEventRequest;
use App\Http\Requests\events\UpdateEventRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private $eventRepository, $eventVoteRepository, $organizationRepository;

    public function __construct(EventRepository $eventRepository, EventVoteRepository $eventVoteRepository, OrganizationRepository $organizationRepository)
    {
        $this->eventRepository = $eventRepository;
        $this->eventVoteRepository = $eventVoteRepository;
        $this->organizationRepository = $organizationRepository;
    }

    //
    public function index(Request $request, EventFilters $filters)
    {
        $organizations = $this->organizationRepository->all();

        $events = $this->eventRepository->filter($filters)
            ->paginate(5);

        return view('events.index', compact('events', 'organizations'));
    }

    public function create()
    {
        $organizations = $this->organizationRepository->all();

        return view('events.create', compact('organizations'));
    }

    public function show($id)
    {
        if (!($event = $this->eventRepository->find($id))) {
            return redirect('/events');
        }
        if (!($event->user_id === auth()->user()->id))
            $event->views++;
        $event->save();
        $comments = $event->comments()->orderBy('created_at', 'desc')->paginate(10);

        return view('events.show', compact('event', 'comments'));
    }

    public function store(StoreEventRequest $request, EventImageTransferable $fileTransfer)
    {
        $organization = null;
        if (strcmp($request->organization, "0") != 0) {
            $organization = $request->organization;
        }
        $img = '/img/events/default.jpg';
        if (request('img') !== null)
            $img = $fileTransfer->move(request('img'));

        if ($this->eventRepository->create(array_merge(request()->except('organization'), ["img" => $img, "status" => $this->getStatus(), "user_id" => auth()->user()->id, "organization_id" => $organization]))) ;
            return back()->with('success', 'Event Successfully registered');

        return back()->with('error', 'Unable to register event, Please contact your administrator to fix this issue');
    }

    public function vote($id)
    {
        if (!(($this->eventRepository->find($id))->checkForVotes())) {
            $this->eventVoteRepository->create([
                'event_id' => $id,
                'user_id' => auth()->user()->id,
                'vote' => request('vote')
            ]);

            return back()->with('success', 'Successfully Voted!');
        }

        return back()->with('error', 'You have already submitted your vote for this suggestion!');
    }

    public function edit($id) {
        $event=$this->eventRepository->find($id);
        if($event->user->id !== auth()->user()->id && !(auth()->user()->is_admin() || auth()->user()->is_superAdmin()))
            return back();

        $organizations = $this->organizationRepository->all();
        return view('events.edit',compact('event', 'organizations'));
    }

    public function update(UpdateEventRequest $request, EventRepository $eventRepository, $id, EventImageTransferable $fileTransfer)
    {
        $event=$this->eventRepository->find($id);

        if($event->user->id !== auth()->user()->id && !(auth()->user()->is_admin() || auth()->user()->is_superAdmin()))
            return back();

        if (strcmp($request->organization, "0") != 0) {
            $organization = $request->organization;
        }
        $img= $event->img;

        if (request('img') !== null){
            $img = $fileTransfer->move(request('img'));
        }

        if ($event->update(array_merge(request()->except('organization'), ["img" => $img, "status" => $this->getStatus(), "user_id" => auth()->user()->id, "organization_id" => $organization])))
            return back()->with('success', 'Event Successfully Updated');

        return back()->with('error', 'Unable to register event, Please contact your administrator to fix this issue');

    }

    public function destroy(Event $event)
    {
        $event->votes()->delete();
        $event->comments()->delete();
        if ($event->delete())
            return redirect('/events')->with('success', 'Event Deleted');

        return back()->with('error', 'Could not delete Event');
    }

    private function getStatus()
    {
        switch (auth()->user()->role_id) {
            case(3):
                return "new";
                break;
            case (1 || 2):
                return "approved";
        }
    }
}
