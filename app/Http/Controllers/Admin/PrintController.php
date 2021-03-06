<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use App\Cosbis\Filters\ElectionFilters;
use App\Cosbis\Repositories\ElectionBoardRepository;
use App\Cosbis\Repositories\EventRepository;
use App\Cosbis\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\UserVote;
use Carbon\Carbon;
use PDF;

class PrintController extends Controller
{
    private  $eventRepository, $userRepository;

    public function __construct(EventRepository $eventRepository, UserRepository $userRepository)
    {
        $this->eventRepository=$eventRepository;
        $this->userRepository=$userRepository;
    }

    public function index()
    {
        return view('prints.index');
    }

    public function election()
    {
        $now=\Carbon\Carbon::now()->year;
        if(Request('year') != null)
            $now= Request('year');
        $candidates= Candidate::whereYear('created_at','=',$now)->orderBy('position_id', 'asc')->get();
        /*$candidates=\App\UserVote::whereYear('created_at','=',$now)
            ->get();*/
        view()->share('candidates',$candidates);

        $pdf = PDF::loadView('prints.election', compact('now'));
        return $pdf->stream();
    }

    /**
     * @param ElectionFilters $filters
     * @return mixed
     */
    public function election_summary(ElectionFilters $filters)
    {
        $parties = \App\Party::filter($filters)->get();
        $now = Request('year');
        if (Request('year') == null) {
            $now = Carbon::now()->format('Y');
            $parties = \App\Party::whereYear('created_at', '=', $now)
                ->orWhere('id', '=', '1')
                ->get();
        }
        $candidates = Candidate::whereYear('created_at', '=', $now)->with(['user', 'election_party'])->get();
        $total_votes = userVote::whereYear('created_at', '=', $now)->get();

        view()->share('candidates', $candidates);

        $pdf = PDF::loadView('prints.election_summary', compact('now','candidates','parties', 'total_votes'));
        return $pdf->stream();
    }

    public function event($id)
    {
        $event=$this->eventRepository->find($id);
        view()->share('event',$event);

        $pdf = PDF::loadView('prints.event');
        return $pdf->stream();
    }

    public function account($id)
    {
        $events=\App\Event::where('user_id','=',$id)->get();
        $account=$this->userRepository->find($id);
        view()->share('account',$account);
        view()->share('events',$events);
        $pdf = PDF::loadView('prints.account');
        return $pdf->stream();
    }
}
