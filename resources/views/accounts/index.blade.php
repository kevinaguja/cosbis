@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/frontpage.css')}}">
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentIndex.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <div class="col-md-12" style="margin-top: 25px;">
            <div class="col-md-12 dark-bottom-border">
                <div>
                    <h3><b>Profile - <small>Welcome to the Cosbr control panel</small></b></h3>
                    <div class="green-bottom-border col-md-2 col-xs-3"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top: 25px;">
            <div class="col-md-2 profilePictureDiv">
                <img src="{{auth()->user()->img}}" class="img-rounded img-thumbnail" alt="Account Image"
                     style="width: 250px;">
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
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#accouncements">Announcements</a></li>
                        <li><a data-toggle="pill" href="#events">Events</a></li>
                        <li><a data-toggle="pill" href="#suggestions">Suggestions</a></li>
                    </ul>
                </div>

                <div class="tab-content">
                    <div id="accouncements" class="tab-pane fade in active">
                        <div class="col-md-12 noPadding">
                            <div class="col-md-4 col-sm-6">
                                <div class="dashBoxes" style="background-color: #4CAF50;">
                                    <h4 style="color: white"><b> Latest Announcement</b></h4>
                                    <hr>
                                    <h5 style="color: whitesmoke"><b>Classes Suspended for Today</b></h5>
                                    <h5 class="dashDetails">
                                        <small>Due to tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017
                                        </small>
                                    </h5>
                                    <button class="btn btn-warning pull-right">Read more</button>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashBoxes" style="background-color: #4CAF50;">
                                    <h4 style="color: white"><b> Latest Announcement</b></h4>
                                    <hr>
                                    <h5 style="color: whitesmoke"><b>Classes Suspended for Today</b></h5>
                                    <h5 class="dashDetails">
                                        <small>Due to tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27,
                                            2017Due to
                                            tropical storm ganda, the
                                            Antipolo City Government has suspended classes for today, September 27, 2017
                                        </small>
                                    </h5>
                                    <button class="btn btn-warning pull-right">Read more</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="events" class="tab-pane fade">
                        <div class="col-md-4">
                            <div class="dashBoxes" style="background-color: #128cce">
                                <h4 style="color: white"><b> Upcomming Event</b></h4>
                                <hr>
                                <h5 style="color: whitesmoke"><b>Buwan ng Kagandahan</b></h5>
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
                                <button class="btn btn-warning pull-right">Read more</button>
                            </div>
                        </div>
                    </div>
                    <div id="suggestions" class="tab-pane fade">
                        <div class="col-md-4">
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
@endsection
