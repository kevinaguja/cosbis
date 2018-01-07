@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/frontpage.css')}}">
    <link rel="stylesheet" href="{{asset('css/studentIndex.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="margin-top: 10px">
        <div class="col-md-12 col-sm-12 bg-white">
            <div class="col-md-12">
                <div class="col-md-3 profilePictureDiv">
                    <img src="{{$account->img}}" class="img-rounded img-thumbnail" alt="Account Image"
                         style="width: 250px;">
                </div>
                <div class="col-md-8">
                    <h3 class="profilePictureDetails noMargin">
                        <b>{{$account->firstname." ".$account->lastname}}, </b>
                        @switch($account->role_id)
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
                                class="glyphicon glyphicon-map-marker"></span> {{$account->email}}</h5>
                    <h5 class="profilePictureDetails"><span
                                class="glyphicon glyphicon-phone"></span> {{$account->phone}}</h5>
                    <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-book"></span> Member
                        since: {{Carbon\Carbon::parse($account->created_at)->toFormattedDateString()}}</h5>
                    <h5 class="profilePictureDetails"><span class="glyphicon glyphicon-pencil"></span>Last updated
                        on: {{Carbon\Carbon::parse($account->updated_at)->diffForHumans()}}</h5>
                    <a class="btn btn-primary" href="/accounts/{{$account->id}}/edit">Edit Profile</a>
                </div>
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
@endsection