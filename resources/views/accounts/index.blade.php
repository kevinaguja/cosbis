@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
    <link rel="stylesheet" href="{{asset('css/events.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-12 col-xs-12 col-sm-12 noPadding noMargin padding-25">
            <div class="col-md-12 noPadding">
                <div class="col-md-12 bg-white roundedCorners padding-25">
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
                        <a href="/profile/edit"><span class="glyphicon glyphicon-cog"></span> Edit Profile</a>
                    </div>
                </div>
                <div class="col-md-12 bg-white roundedCorners padding-25">
                    <div class="col-md-12" style="margin-bottom: 15px;">
                        <ul class="nav nav-pills" style="border-radius: 0px;">
                            <li class= 'active'><a data-toggle="pill" href="#index"><span class="glyphicon glyphicon-th-list"></span> Events</a></li>
                            <li><a data-toggle="pill" href="#upcomming"><span class="glyphicon glyphicon-collapse-up"></span> Upcomming Events</a></li>
                            <li><a data-toggle="pill" href="#suggestions"><span class="glyphicon glyphicon-plus-sign"></span> New Suggestions</a></li>
                            <li><a data-toggle="pill" href="#relevant"><span class="glyphicon glyphicon-eye-open"></span> relevant</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content announcementsDiv">
                            <div id="index" class="tab-pane fade in active">
                                <ul class="list-unstyled">
                                    @foreach($events as $event)
                                        <li>
                                            <h5>
                                                <b>{{Carbon\Carbon::parse($event->date)->toDayDateTimeString()}}</b>
                                                <p class="pull-right"><small>{{count($event->comments)}} comments</small></p>
                                            </h5>
                                            <p>{{$event->title}} <a href="/events/{{$event->id}}" class="pull-right" style="border:none; color: cornflowerblue !important;">Find out more</a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="upcomming" class="tab-pane">
                                <ul class="list-unstyled">
                                    @foreach($upcomming_events as $event)
                                        <li>
                                            <h5>
                                                <b>{{Carbon\Carbon::parse($event->date)->toDayDateTimeString()}}</b>
                                                <p class="pull-right"><small>{{count($event->comments)}} comments</small></p>
                                            </h5>
                                            <p>{{$event->title}} <a href="/events/{{$event->id}}" class="pull-right" style="border:none; color: cornflowerblue !important;">Find out more</a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="suggestions" class="tab-pane">
                                <ul class="list-unstyled">
                                    @foreach($new_events as $event)
                                        <li>
                                            <h5>
                                                <b>{{Carbon\Carbon::parse($event->date)->toDayDateTimeString()}}</b>
                                                <p class="pull-right"><small style="color: limegreen">{{count($event->votes)}} votes!</small></p>
                                                <p class="pull-right"><small>{{count($event->comments)}} comments</small></p>
                                            </h5>
                                            <p>{{$event->title}} <a href="/events/{{$event->id}}" class="pull-right" style="border:none; color: cornflowerblue !important;">Find out more</a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="relevant" class="tab-pane">
                                <ul class="list-unstyled">
                                    @foreach($relevant_events as $event)
                                        <li>
                                            <h5>
                                                <b>{{Carbon\Carbon::parse($event->date)->toDayDateTimeString()}}</b>
                                                <p class="pull-right"><small>{{$event->views}} views</small></p>
                                                <p class="pull-right"><small style="color: limegreen">{{count($event->votes)}} votes!</small></p>
                                                <p class="pull-right"><small style="color: blue">{{count($event->comments)}} comments</small></p>
                                            </h5>
                                            <p>{{$event->title}} <a href="/events/{{$event->id}}" class="pull-right" style="border:none; color: cornflowerblue !important;">Find out more</a></p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
