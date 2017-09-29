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
        <div class="col-md-12 noPadding eventBannerDiv" style="background-image: url({{$event->img}})">

        </div>
        <div class="container eventDetails" style="background-color: #FFF">
            <div class="col-md-12">
                <h3>
                    <b>{{$event->title}}</b>
                    <br>
                    <small>{{$event->description}}</small>
                    <br><br>
                    <button class="btn btn-success" style="background-color: #4CAF50">Edit</button>
                    @if((strcmp('new', $event->status)===0 && $event->user_id === auth()->user()->id) || auth()->user()->is_admin() || auth()->user()->is_superadmin())
                    <button class="btn btn-danger">Delete</button>
                    @endif
                </h3>
                <hr>
                <p><b>Theme: </b>{{$event->theme}}</p>
                <p><b>Type: </b>{{$event->type}}</p>
                <p><b>Date: </b>{{$event->date}}</p>
                <p><b>Time: </b>{{$event->time}}</p>
                <p><b>Venue: </b>{{$event->location}}</p>
                <hr>
                <h5><b><img src="{{$event->user->img}}" style="width: 50px; height: 50px;"
                                                   class="img-circle"> <p><b>{{$event->user->firstname}} {{$event->user->lastname}}
                                <br> {{Carbon\Carbon::parse($event->created_at)->toFormattedDateString()}}</b><small>({{Carbon\Carbon::parse($event->created_at)->diffForHumans()}})</small></p>
                    </b></h5>

            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
