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
                    <li class= 'active'><a data-toggle="pill" href="#index">Index</a></li>
                    <li><a data-toggle="pill" href="#upcomming">Upcomming</a></li>
                    <li><a data-toggle="pill" href="#suggestions">New Suggestions</a></li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="tab-content announcementsDiv">
                    <div id="index" class="tab-pane fade in active">
                        <ul class="list-unstyled">
                            @foreach($events as $event)
                                <li>
                                    <h5><b>{{Carbon\Carbon::parse($event->date)->toDayDateTimeString()}}</b></h5>
                                    <p>{{$event->title}} <a href="/events/{{$event->id}}" class="pull-right" style="border:none; color: cornflowerblue !important;">Find out more</a></p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="upcomming" class="tab-pane">
                        <ul class="list-unstyled">
                            @foreach($upcomming_events as $event)
                                <li>
                                    <h5><b>{{Carbon\Carbon::parse($event->date)->toDayDateTimeString()}}</b></h5>
                                    <p>{{$event->title}} <a href="/events/{{$event->id}}" class="pull-right" style="border:none; color: cornflowerblue !important;">Find out more</a></p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div id="suggestions" class="tab-pane">
                        <ul class="list-unstyled">
                            @foreach($new_events as $event)
                                <li>
                                    <h5><b>{{Carbon\Carbon::parse($event->date)->toDayDateTimeString()}}</b></h5>
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
