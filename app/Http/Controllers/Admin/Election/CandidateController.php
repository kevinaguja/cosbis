<?php

namespace App\Http\Controllers\Admin\Election;

use App\Candidate;
use App\Cosbis\Repositories\CandidateRepository;
use App\Cosbis\Repositories\Criterias\Events\OrderBy;
use App\Cosbis\Repositories\Criterias\Events\Where;
use App\Cosbis\Repositories\PartyRepository;
use App\Cosbis\Repositories\PositionRepository;
use App\Cosbis\Repositories\UserRepository;
use App\Http\Requests\Admin\AdminCreateCandidateRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    private $positionRepository;
    private $partyRepository;
    private $userRepository;
    private $candidateRepository;

    public function __construct(PositionRepository $positionRepository, PartyRepository $partyRepository,
                                UserRepository $userRepository, CandidateRepository $candidateRepository)
    {
        $this->positionRepository=$positionRepository;
        $this->partyRepository=$partyRepository;
        $this->userRepository=$userRepository;
        $this->candidateRepository=$candidateRepository;

    }

    public function create(){
        $now= Carbon::now()->format('Y');

        $candidates= \App\Candidate::whereYear('created_at', '=', $now)->pluck('user_id');
        $candidates= \App\User::whereNotIn('id', $candidates)->where([['id','!=','1'], ['is_suspended', '!=', '1']])->get();

        $positions=$this->positionRepository->all();
//        $parties=$this->partyRepository->pushCriteria(new Where([['id','=','1'],['created_at','=',$now]]))
//            ->pushCriteria(new OrderBy('name', 'asc'))
//            ->all();
        $parties=\App\Party::whereYear('created_at','=',$now)
            ->orWhere('id','=','1')
            ->get();
        return view('election.candidate.create',compact('positions','parties','candidates'));
    }

    public function store(AdminCreateCandidateRequest $request)
    {
        $now= Carbon::now()->format('Y');
        $img='img/election/party/logo.png';

        if(\App\Candidate::whereYear('created_at','=',$now)->where('user_id','=',$request['user_id'])->count() > 0){
            return back()->with('error', "That student is already a candidate for this year's election!");
        }
        else{
            $this->candidateRepository->create([
                'user_id' => $request['user_id'],
                'position_id'=> $request['position'],
                'slogan'=>$request['slogan'],
                'statement'=>$request['statement'],
                'party'=>$request['party_id'],
                'img'=>$img,
            ]);
        }

        return redirect()->back()->with('sucess', 'Candidate has been successfully registered!');
    }

    public function edit($id)
    {
        if($candidate=$this->candidateRepository->find($id)){
            $now= Carbon::now()->format('Y');
            $candidates= \App\Candidate::whereYear('created_at', '=', $now)->pluck('user_id');
            $candidates= \App\User::whereNotIn('id', $candidates)->where([['id','!=','1'], ['is_suspended', '!=', '1']])->OrderBy('lastname', 'asc')->get();
            $positions=$this->positionRepository->all();
//        $parties=$this->partyRepository->pushCriteria(new Where([['id','=','1'],['created_at','=',$now]]))
//            ->pushCriteria(new OrderBy('name', 'asc'))
//            ->all();
            $parties=\App\Party::whereYear('created_at','=',$now)
                ->orWhere('id','=','1')
                ->get();

            return view('election.candidate.edit',compact('positions','parties','candidates','candidate','user'));
        }

        return redirect('/profile');

    }


    public function update(Candidate $candidate, Request $request)
    {
        $data=array(
            'user_id' => $request['user_id'],
            'position_id' => $request['position'],
            'slogan' => $request['slogan'],
            'statement' => $request['statement'],
            'party' => $request['party_id']
        );

        $candidate->update($data);

        return redirect()->back();
    }
}
