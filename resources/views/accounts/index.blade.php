@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-12 col-xs-12 col-sm-12 bg-white noPadding noMargin padding-25">
            <div class="col-md-12">
                <div class="col-md-3 profilePictureDiv">
                    <img src="{{auth()->user()->img}}" class="img-rounded img-thumbnail" alt="Account Image"
                         style="max-width: 350px; width: 100%">
                </div>
                <div class="col-md-8">
                    <h3 class="profilePictureDetails noMargin">
                        <b>{{auth()->user()->firstname." ".auth()->user()->lastname}}, </b>
                        @switch(auth()->user()->role_id)
                            @case (3)
                            <small>Student</small>
                            @break
                            @case (2)
                            <small>Student Council Member</small>
                            @break
                            @case (1)
                            <small>Super Administrator</small>
                        @endswitch
                    </h3>
                    <h5 class="profilePictureDetails"><span
                                class="glyphicon glyphicon-map-marker"></span> {{auth()->user()->email}}</h5>
                    <h5 class="profilePictureDetails"><span
                                class="glyphicon glyphicon-phone"></span> {{auth()->user()->phone}}</h5>
                    <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-book"></span> Member
                        since: {{Carbon\Carbon::parse(auth()->user()->created_at)->toFormattedDateString()}}</h5>
                    <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-pencil"></span>Last updated
                        on: {{Carbon\Carbon::parse(auth()->user()->updated_at)->diffForHumans()}}</h5>
                    <button class="btn btn-primary" onclick="window.location.href='/profile/edit'">Edit Profile</button>
                </div>
                <div class="col-md-12">
                    <hr>
                    <div class="col-md-12" style="margin-bottom: 15px">
                        <ul class="nav nav-pills" style="border-radius: 0px">
                            <li class= '{{strcmp(request('active'), '1')==0 || strcmp(request('active'), '')==0 ? "active": ""}}'><a data-toggle="pill" href="#accouncements">Announcements</a></li>
                            <li class= '{{strcmp(request('active'), '2')==0 ? "active": ""}}'><a data-toggle="pill" href="#events">Events</a></li>
                            <li class= '{{strcmp(request('active'), '3')==0 ? "active": ""}}'><a data-toggle="pill" href="#suggestions">Suggestions</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div id="accouncements" class= '{{strcmp(request('active'), '1')==0 || strcmp(request('active'), '')==0 ? "tab-pane fade in active": "tab-pane fade"}}'>
                            @foreach($announcements as $announcement)
                                <div class="col-md-12">
                                    <div class="dashBoxes" style="box-shadow: none; max-height: none;">
                                        <div>
                                            <h4><b>{{$announcement->title}}</b> <small style="color: grey">{{Carbon\Carbon::parse($announcement->created_at)->diffForHumans()}}</small>
                                            </h4>
                                            <h4 class="col-md-12 text-justify">
                                                {{$announcement->announcement}}
                                            </h4>
                                        </div>
                                        <div class="col-md-12 noPadding">
                                            <h6 style="color: black" class="pull-left">
                                                <img src="{{$announcement->user->img}}" alt="" style="width: 50px; display: inline" class="img-circle">
                                                @switch($announcement->user->role_id)
                                                    @case('1')
                                                    <b class="alert-success"> By: {{$announcement->user->firstname}} {{$announcement->user->lastname}}</b>
                                                    @break;
                                                    @case('2')
                                                    <b class="alert-warning"> By: {{$announcement->user->firstname}} {{$announcement->user->lastname}}</b>
                                                    @break;
                                                    @case('3')
                                                    <b class="alert-danger"> By: {{$announcement->user->firstname}} {{$announcement->user->lastname}}</b>
                                                    @break;
                                                @endswitch
                                            </h6>
                                            <button class="btn btn-danger pull-right navbar-text">Read more</button>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                            <div class="col-md-12 text-right">
                                {{$announcements->links()}}
                            </div>
                        </div>
                        <div id="events" class= '{{strcmp(request('active'), '2')==0 ? "tab-pane fade in active": "tab-pane fade"}}'>
                            @foreach($events as $event)
                                <div class="col-md-12">
                                    <div class="dashBoxes" style="box-shadow: none; max-height: none;">
                                        <img src="{{$event->img}}" alt="News Image" style="width: 100%">
                                        <hr>
                                        <h4><b> {{$event->title}}</b> <br> <small style="color: grey">({{Carbon\Carbon::parse($event->date)->toFormattedDateString()}} - {{$event->time}}) {{Carbon\Carbon::parse($event->date)->diffForHumans()}}</small></h4>
                                        <h6 style="color: grey"><b> By: {{$event->user->firstname}} {{$event->user->lastname}}</b></h6>
                                        <h4 class="dashDetails" style="color: #000;">
                                            <small>
                                                {{$event->description}}
                                            </small>
                                        </h4>
                                        <button class="btn btn-warning pull-right">Read more</button>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-md-12 text-right">
                                {!! $events->appends(['active' => 2])->links() !!}
                            </div>
                        </div>
                        <div id="suggestions" class= '{{strcmp(request('active'), '3')==0 ? "tab-pane fade in active": "tab-pane fade"}}'>
                            <div class="col-md-6 col-sm-6">
                                <div class="dashBoxes" style="background-color: #298aad">
                                    <h4 style="color: white"><b> Latest Suggestion</b></h4>
                                    <hr>
                                    <h5 style="color: whitesmoke"><b>Buwan ng Kapogian</b></h5>
                                    <h5 class="dashDetails">
                                        <small>Due to tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017Due
                                            to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017Due
                                            to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017Due
                                            to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017Due
                                            to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017Due
                                            to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017
                                        </small>
                                    </h5>
                                    <button class="btn btn-warning pull-right">Read More</button>
                                    <button class="btn btn-info pull-right" style="margin-right: 5px">Upvote</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
