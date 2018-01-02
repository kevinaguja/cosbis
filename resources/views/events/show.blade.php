@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
    <link rel="stylesheet" href="{{asset('css/events.css')}}">
@endsection

@section('navigation')
@endsection

@section('content')
    <div class="col-md-12">
        <div class="col-md-12 col-sm-12 col-xs-12 eventDetails noPadding">
            <div class="col-md-12 noPadding noMargin eventBannerDiv">
                <img src="{{$event->img}}" alt="" style="width:100%;">
            </div>
            <div class="container" style="padding-left: 0px; padding-right: 0px; height: auto; border: none;">
                <div class="col-md-12 noMargin bg-white roundedCorners">
                    <h3>
                        <p><b>{{$event->title}} <small style = "color:red">({{Carbon\Carbon::parse($event->date)->diffForHumans()}})</small></b></p>
                        <p style="text-indent: 1em" class="text-justify"><small >{{$event->description}}</small></p>
                        <br>
                        @if((strcmp('new', $event->status)===0 && $event->user_id === auth()->user()->id) || auth()->user()->is_admin() || auth()->user()->is_superadmin())
                            <button class="btn btn-success" style="background-color: #4CAF50">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        @endif
                        @if((strcmp('new', $event->status)===0 && !$event->checkForVotes() && $event->user_id !== auth()->user()->id))
                            <form action="/events/{{$event->id}}/vote" method="POST" style="display: inline">
                                {{csrf_field()}}

                                <button class="btn btn-success" style="background-color: #4CAF50" name="vote" value="1">Huzzah!</button>
                                <button class="btn btn-danger" name="vote" value="0">Boo!</button>
                            </form>
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
                    <h5><b>
                            <img src="{{$event->user->img}}" style="width: 50px; height: 50px;"
                                 class="img-circle">
                            <p><b>{{$event->user->firstname}} {{$event->user->lastname}}
                                    <br> {{Carbon\Carbon::parse($event->created_at)->toFormattedDateString()}}</b>
                                <small>({{Carbon\Carbon::parse($event->created_at)->diffForHumans()}})</small>
                            </p>
                        </b>
                    </h5>
                    <hr>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('success')}}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('error')}}
                        </div>
                    @endif
                    <form action="/events/{{$event->id}}" method="POST" style="margin-bottom: 15px">
                        {{csrf_field()}}

                        <div class="form-group">
                            <textarea name="comment" id="" rows="10" class="form-control" style="resize: none" placeholder="Tell us what you think..." required></textarea>
                        </div>
                        <button class="btn btn-primary">Comment</button>
                    </form>
                </div>
                <div class="col-md-12 noMargin bg-white roundedCorners" style="margin-bottom: 15px">
                    @foreach($comments as $comment)
                        <div class="col-md-12 noPadding commentBox" style="border-left-color: {{$comment->user->is_student()? 'green': ($comment->user->is_superadmin()? 'red':'yellow')}}">
                            <div class="col-md-1 col-sm-2 pullLeftOnXs text-right">
                                <img src="{{$comment->user->img}}" alt="user_image" style="width: 50px; height: 50px" class="img-circle">
                            </div>
                            <div class="col-md-11 col-sm-10">
                                <p>
                                    <b>{{$comment->user->firstname}} {{$comment->user->lastname}}</b> <small>{{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</small>
                                </p>
                                <p>{{$comment->comment}}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 text-right">
                        {{$comments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
