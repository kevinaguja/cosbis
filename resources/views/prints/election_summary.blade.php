@extends('prints.layout')

@section('content')
    <div class="col-md-12 noPadding" id="app">
        <div class="col-md-12 noPadding">
            <div class="col-md-12 bg-white noPadding roundedCorners">
                <div class="col-md-12 noPadding">
                    <hr>
                    <div class="col-md-12">
                        <div class="col-md-5">
                            <h5><b>President</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 1)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-5">
                            <h5><b>VP of Operations</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 2)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-5">
                            <h5><b>VP of Activities</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 3)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-5">
                            <h5><b>VP of Academics</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 4)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-5">
                            <h5><b>VP of Finance</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 5)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                        <div class="col-md-5">
                            <h5><b>Secretary</b></h5>
                            <ol>
                                @foreach($candidates as $candidate)
                                    @if($candidate->position_id == 6)
                                        <li><h5>{{$candidate->user->firstname}} {{$candidate->user->lastname}}
                                                - {{$candidate->userVote->count()}}</h5></li>
                                    @endif
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <h2><b>Election Parties and Candidates Breakdown</b></h2>
            <h3><small>Total Parties: {{$parties->count()}}</small></h3>
            <h3><small>Total Candidates: {{$candidates->count()}}</small></h3>
            <h3><small>Total Votes: {{$total_votes->count()}}</small></h3>
            <hr>
            @foreach($parties as $party)
                @if($party->id==1)
                    <div class="col-md-12 bg-white noPadding roundedCorners">
                        <div class="col-md-12 noPadding" style="border:none; max-width: 100%">
                            <div class="col-md-12">
                                <h3><b>{{ucwords(strtolower($party->name))}}</b><span> <small> - <q>{{$party->slogan}}</q></small></span>
                                </h3>
                                <hr class="col-md-5" style="padding-top: 0; margin-top: 0; border-color: GREEN; ">
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    @foreach($candidates as $candidate)
                                        @if($party->id==$candidate->party)
                                            <h6 style="text-indent: 20px"><b>{{$candidate->position->name}}:</b>
                                                <span>{{$candidate->user->firstname.' '.$candidate->user->lastname}}</span>
                                            </h6>
                                        @endif
                                    @endforeach
                                    <h6 style="text-indent: 20px"><b>Description:</b>
                                        <span>{{$party->description}}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 bg-white noPadding roundedCorners">
                        <div class="col-md-12 noPadding" style="border:none; max-width: 100%">
                            <div class="col-md-12">
                                <h3><b>{{ucwords(strtolower($party->name))}}</b><span> <small> - <q>{{$party->slogan}}</q></small></span>
                                </h3>
                                <hr class="col-md-5" style="padding-top: 0; margin-top: 0; border-color: GREEN; ">
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    @foreach($candidates as $candidate)
                                        @if($party->id==$candidate->party)
                                            <h6 style="text-indent: 20px"><b>{{$candidate->position->name}}:</b>
                                                <span>{{$candidate->user->firstname.' '.$candidate->user->lastname}}</span>
                                            </h6>
                                        @endif
                                    @endforeach
                                    <h6 style="text-indent: 20px"><b>Description:</b>
                                        <span>{{$party->description}}</span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection