@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/election/candidate.css')}}">
@endsection

@section('content')
    <div class="col-md-12 noPadding">
        <div class="col-md-12 col-xs-12 col-sm-12 noPadding">
            <div class="col-md-12 col-xs-12 col-sm-12 bg-white noPadding roundedCorners" style="padding-bottom: 20px; padding-bottom: 0px">
                <div class="container noPadding" style="height: 100%; border:none; max-width: 100%; padding-bottom: 0px">
                    <form action="/election" method="get">
                        <div class="col-md-3" style="padding: 10px">
                            <div class="form-group">
                                <select name="year" id="year" class="form-control">
                                    @for($year= 2018; $year <= now()->year; $year++)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3" style="padding: 10px">
                            <div class="form-group">
                                <button class="btn btn-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @foreach($parties as $party)
                @if($party->id==1)
                    <div class="col-md-12 col-xs-12 col-sm-12 bg-white noPadding roundedCorners"
                         style="padding-bottom: 20px">
                        <div class="container noPadding" style="height: 100%; border:none; max-width: 100%">
                            <div class="col-md-12">
                                <h3><b>{{ucwords(strtolower($party->name))}}</b><span> <small> - <q>{{$party->slogan}}</q></small></span>
                                </h3>
                                <hr class="col-md-5" style="padding-top: 0; margin-top: 0; border-color: GREEN; ">
                            </div>

                            <div class="col-md-6" style="">
                                <div class="col-md-12">
                                    <img src="{{$party->banner}}" alt="Party Banner" style="width: 100%;"
                                         class="topLeft img-thumbnail">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    @foreach($candidates as $candidate)
                                        @if($party->id==$candidate->party)
                                            <h6 style="text-indent: 20px"><b>{{$candidate->position->name}}:</b>
                                                <span>{{$candidate->user->firstname.' '.$candidate->user->lastname}}</span> <a href="/election/candidates/{{$candidate->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                            </h6>
                                        @endif
                                    @endforeach
                                    <h6 style="text-indent: 20px"><b>Description:</b>
                                        <span>{{$party->description}}</span>
                                    </h6>
                                    <h6 style="text-indent: 10px">
                                        <a href="/election/parties/{{$party->id}}/edit"><span class="glyphicon glyphicon-pencil"></span> Edit Party</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-12 col-xs-12 col-sm-12 bg-white noPadding roundedCorners"
                         style="padding-bottom: 20px">
                        <div class="container noPadding" style="height: 100%; border:none; max-width: 100%">
                            <div class="col-md-12">
                                <h3><b>{{ucwords(strtolower($party->name))}}</b><span> <small> - <q>{{$party->slogan}}</q></small></span>
                                </h3>
                                <hr class="col-md-5" style="padding-top: 0; margin-top: 0; border-color: GREEN; ">
                            </div>

                            <div class="col-md-6 " style="">
                                <div class="col-md-12">
                                    <img src="{{$party->banner}}" alt="Party Banner" style="width: 100%;"
                                         class="topLeft img-thumbnail">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    @foreach($candidates as $candidate)
                                        @if($party->id==$candidate->party)
                                            <h6 style="text-indent: 20px"><b>{{$candidate->position->name}}:</b>
                                                <span>{{$candidate->user->firstname.' '.$candidate->user->lastname}}</span> <a href="/election/candidates/{{$candidate->id}}/edit"><span class="glyphicon glyphicon-pencil"></span></a>
                                            </h6>
                                        @endif
                                    @endforeach
                                    <h6 style="text-indent: 20px"><b>Description:</b>
                                        <span>{{$party->description}}</span>
                                    </h6>
                                    @if($party->created_at->year == now()->year)
                                            <h6 style="text-indent: 10px">
                                                <a href="/election/parties/{{$party->id}}/edit"><span class="glyphicon glyphicon-pencil"></span> Edit Party</a>
                                            </h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection