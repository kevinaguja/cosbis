<?php

namespace App\Http\Controllers\Admin\Election;

use App\Cosbis\Repositories\PartyRepository;
use App\Http\Requests\Admin\AdminCreatePartyRequest;
use App\Http\Requests\Admin\AdminUpdatePartyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartyController extends Controller
{
    private $partyRepository;

    public function __construct(PartyRepository $partyRepository)
    {
        $this->partyRepository=$partyRepository;
    }

    public function create()
    {
        return view('election.party.create');
    }

    public function store(AdminCreatePartyRequest $request)
    {
        $logo='/img/election/party/logo.png';
        $banner='img/cosbis/header.png';
//        if (request('logo')!==null)
//            $logo=$this->accountImageHandler->move(request('logo'));
//
//        if (request('banner')!==null)
//            $banner=$this->accountImageHandler->move(request('banner'));

        $this->partyRepository->create([
           'name'=>$request['name'],
           'slogan'=>$request['slogan'],
           'description'=>$request['description'],
            'logo'=>$logo,
            'banner'=>$banner
        ]);

        return back();
    }

    public function edit($id)
    {
        $party=$this->partyRepository->find($id);
        return view('election.party.edit',compact('party'));

    }

    public function update($id, AdminUpdatePartyRequest $request)
    {
        $logo='/img/election/party/logo.png';
        $banner='img/cosbis/header.png';
        $party=$this->partyRepository->find($id);

        $data=array(
            'name'=>$request['name'],
            'slogan'=>$request['slogan'],
            'description'=>$request['description'],
            'logo'=>$logo,
            'banner'=>$banner
        );
        $party->update($data);
        return redirect()->back();
    }
}
