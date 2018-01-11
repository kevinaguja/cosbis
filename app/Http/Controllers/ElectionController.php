<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Cosbis\Filters\AnnouncementFilters;
use App\Cosbis\Repositories\CandidateRepository;
use App\UserVote;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Object_;

/**
 * @property string now
 */
class ElectionController extends Controller
{

    private $candidateRepository;

    /**
     * ElectionController constructor.
     * @param CandidateRepository $candidateRepository
     */
    public function __construct(CandidateRepository $candidateRepository)
    {
        $this->candidateRepository = $candidateRepository;
        $this->now = Carbon::now()->format('Y');
        $this->positions = ['president' => 1, 'vp_operations' => 2, 'vp_activities' => 3, 'vp_academics' => 4, 'vp_finance' => 5, 'secretary' => 6];
    }

    public function index(AnnouncementFilters $filters)
    {
        $has_voted = false;
        if (UserVote::whereYear('created_at', '=', $this->now)->where('user_id', '=', auth()->user()->id)->count() > 0) {
            $has_voted = true;
        }

        $candidates = Candidate::whereYear('created_at', '=', $this->now)->with(['user', 'election_party'])->get();

        return view('election.vote', compact('candidates', 'has_voted'));
    }

    public function store(Request $request)
    {
        $data = [];
        $now = Carbon::now()->toDateTimeString();
        foreach (array_keys($request->except('_token')) as $position) {
            if (Request($position) == null)
                continue;
            $vote = new UserVote();
            $vote->candidate_id = Request($position);
            $vote->user_id = auth()->user()->id;
            $vote->position_id = $this->positions[$position];
            $vote->created_at = $now;
            $vote->updated_at = $now;
            $data[] = $vote->attributesToArray();
        }
        foreach ($data as $vote) {
            UserVote::create($vote);
        }
        return redirect()->back();
    }
}
