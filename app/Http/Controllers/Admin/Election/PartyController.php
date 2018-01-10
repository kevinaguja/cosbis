<?php

namespace App\Http\Controllers\Admin\Election;

use App\Candidate;
use App\Cosbis\Repositories\PartyRepository;
use App\Http\Requests\Admin\AdminCreatePartyRequest;
use App\Http\Requests\Admin\AdminUpdatePartyRequest;
use App\Party;
use Carbon\Carbon;
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

        return back()->with('success', 'Party successfully registered!');
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
        return redirect()->back()->with('success', 'Party information successfully updated');
    }

    public function destroy(Party $party)
    {
        if($party->id === 1){
            return back()->with('error', 'Deleting the Independent Party Category is not allowed');
        }
        $now= Carbon::now()->format('Y');
        if(Candidate::whereYear('created_at', '=', $now)->where('party', '=', $party->id)->update(['party' => 1])){
            if($party->delete()){
                return redirect('/election/parties/create')->with('success', 'Candidate Successfully Removed');
            }
        }

        return back()->with('error', 'There was an error trying to delete the candidate. Please try again');
    }
}
