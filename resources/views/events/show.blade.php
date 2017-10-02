@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/events.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <div class="col-md-12 col-sm-12 col-xs-12 eventDetails noPadding bg-white" style="background-color: #FFF">
            <div class="col-md-12 noPadding noMargin eventBannerDiv">
                <img src="{{$event->img}}" alt="" style="width:100%;">
            </div>
            <div class="col-md-12" style="padding-left: 5em; padding-right: 5em">
                <h3>
                    <p><b>{{$event->title}} <small style = "color:red">({{Carbon\Carbon::parse($event->date)->diffForHumans()}})</small></b></p>
                    <p style="text-indent: 1em" class="text-justify"><small >{{$event->description}}</small></p>
                    <br>
                    @if((strcmp('new', $event->status)===0 && $event->user_id === auth()->user()->id) || auth()->user()->is_admin() || auth()->user()->is_superadmin())
                        <button class="btn btn-success" style="background-color: #4CAF50">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    @endif
                    @if((strcmp('new', $event->status)===0 && $event->user_id !== auth()->user()->id))
                        <button class="btn btn-success" style="background-color: #4CAF50">Upvote</button>
                        <button class="btn btn-danger">Boo!</button>
                    @endif
                </h3>
                <hr>
                <p><b>Theme: </b>{{$event->theme}}</p>
                <p><b>Type: </b>{{$event->type}}</p>
                <p><b>Date: </b>{{Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</p>
                <p><b>Time: </b>{{Carbon\Carbon::parse($event->time)->format('g:i A')}}</p>
                <p><b>Venue: </b>{{$event->location}}</p>
                @switch($event->status)
                    @case('approved')
                    <p><b>Status: <span class="alert-success">Official Event</span></b></p>
                    @break;
                    @case('rejected')
                    <p><b>Status: <span class="alert-danger">Rejected</span></b></p>
                    @break;
                    @case('new')
                    <p><b>Status: <span class="alert-info">New Entry</span></b></p>
                    @break;
                @endswitch
                <hr>
                <h5><b><img src="{{$event->user->img}}" style="width: 50px; height: 50px;"
                            class="img-circle">
                        <p><b>{{$event->user->firstname}} {{$event->user->lastname}}
                                <br> {{Carbon\Carbon::parse($event->created_at)->toFormattedDateString()}}</b>
                            <small>({{Carbon\Carbon::parse($event->created_at)->diffForHumans()}})</small>
                        </p>
                    </b></h5>

            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
