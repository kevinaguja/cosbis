@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/announcements.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <div class="col-md-12 col-xs-12 col-sm-12 bg-white" style="padding-top: 25px">
            <div class="col-md-12" style="margin-bottom: 10px">
                <div class="col-md-4 col-xs-12 noPadding" style="margin-bottom: 10px;">
                    <label for="author"><small>Filter</small></label>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <div class="col-md-3 col-md-offset-5 noPadding">
                    <label for="author"><small>Sort By</small></label>
                    <select name="auhor" id="author" class="form-control" onchange="redirect(this)">
                        <option>Select</option>
                        <option value="views,order=desc">Popular</option>
                        <option value="created_at">Latest</option>
                        <option value="created_at,order=desc">Earliest</option>
                        <option value="title">Title</option>
                        <option value="announcement">Announcement</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div id="accouncements" class= '{{strcmp(request('active'), '1')==0 || strcmp(request('active'), '')==0 ? "tab-pane fade in active": "tab-pane fade"}}'>
                    @foreach($announcements as $announcement)
                        <div class="col-md-12 panel panel-default">
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
                        </div>
                    @endforeach
                    <div class="col-md-12 text-right">
                        {{$announcements->appends(request()->except('page'))->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function redirect(el){
            console.log(el.value);
            window.location.href= '/announcements?sort='+el.value;
        }
    </script>
@endsection
