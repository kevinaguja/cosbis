<?php

namespace App\Http\Controllers\Admin;

use App\Candidate;
use App\Cosbis\Repositories\ElectionBoardRepository;
use App\Cosbis\Repositories\EventRepository;
use App\Cosbis\Repositories\UserRepository;
use App\Http\Controllers\Controller;
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
        $candidates= Candidate::whereYear('created_at','=',$now)->orderBy('position_id', 'asc')->get();
        /*$candidates=\App\UserVote::whereYear('created_at','=',$now)
            ->get();*/
        view()->share('candidates',$candidates);

        $pdf = PDF::loadView('prints.election');
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
