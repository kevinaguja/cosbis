@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentIndex.css')}}">
    <link rel="stylesheet" href="{{asset('css/events.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white" style="padding-top: 25px">
            <div class="col-md-12" style="margin-bottom: 15px;">
                <ul class="nav nav-pills" style="border-radius: 0px;">
                    <li class= 'active'><a data-toggle="pill" href="#index"><span class="glyphicon glyphicon-th-list"></span> Index</a></li>
                    <li><a data-toggle="pill" href="#upcomming"><span class="glyphicon glyphicon-collapse-up"></span> Upcomming</a></li>
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

    <script>
        var events= {!! json_encode($events) !!};

        var Main = {
            data() {
                return {
                    tableData3: events
                }
            },
            methods: {
                move: function(id){
                    window.location.href='/events/' + id
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
