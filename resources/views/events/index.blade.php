@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
@endsection
@section('navigation')
@endsection
@section('content')
    <div class="col-md-12 noPadding" style="margin-top: 10px" id="app">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white noPadding">
            {{--<div class="col-md-12 dark-bottom-border">
                <div>
                    <h3><b>Events - <small>Regularly check on the events lists in order to avoid missing out on all of the campus fun</small></b></h3>
                    <div class="green-bottom-border col-md-2 col-xs-3"></div>
                </div>
            </div>--}}
            <div class="container"
                 style="padding-bottom: 25px; padding-top: 25px; border: none; height: auto; max-width: 100%">
                <div class="col-md-12 noPadding">
                    @if(session()->has('success'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('success')}}
                        </div>
                    @endif
                    <form action="/events" method="get">
                        <div class="col-md-12 noPadding" style="margin-bottom: 15px;">
                            <div class="col-md-2">
                                <label for="">Search by Name</label>
                                <input type="text" class="form-control" placeholder="Search..." name="search_name">
                            </div>
                            <div class="col-md-2">
                                <label for="">Search by Org</label>
                                <select name="organization" id="organization" class="form-control" name="search_org">
                                    <option value="null" selected disabled hidden>None</option>
                                    @foreach($organizations as $organization)
                                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 noPadding">
                                <div class="col-md-6 noSidePaddingOnSm">
                                    <label for="">Sort by Criteria</label>
                                    <select name="search_date" id="filter_1" class="form-control">
                                        <option value="null" selected disabled hidden>Default</option>
                                        <option value="latest">Latest</option>
                                        <option value="oldest">Oldest</option>
                                        <option value="future">Future Events</option>
                                        <option value="past">Past Events</option>
                                    </select>
                                </div>
                                <div class="col-md-6 noSidePaddingOnSm">
                                    <label for="">Sort by Type</label>
                                    <select name="status" id="filter_2" class="form-control">
                                        <option value="null" selected disabled hidden>All</option>
                                        <option value="approved">Official Event</option>
                                        <option value="new">New Suggestions</option>
                                        <option value="rejected">Rejected Suggestions</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2" style="margin-top: 25px">
                                <input type="submit" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                    @foreach($events as $event)
                        <div class="col-md-12" style="margin-bottom: 25px">
                            <div class="col-md-12 noPadding">
                                <img src="{{$event->img}}" alt="Event Image" style="width: 100%">
                                <hr>
                                <h4><b> {{$event->title}}</b> <br>
                                    <small style="color: grey">
                                        ({{Carbon\Carbon::parse($event->date)->toFormattedDateString()}}
                                        - {{$event->time}}
                                        ) {{Carbon\Carbon::parse($event->date)->diffForHumans()}}</small>
                                </h4>
                                <h6 style="color: grey"><b>
                                        By: {{$event->user->firstname}} {{$event->user->lastname}}</b></h6>
                                <h4 class="dashDetails" style="color: #000;">
                                    <small>
                                        {{$event->description}}
                                    </small>
                                </h4>
                                <button class="btn btn-primary pull-right"
                                        onclick="window.location.href='events/{{$event->id}}'" style="margin-bottom: 30px">Read more
                                </button>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-12 text-right">
                        {{$events->appends(request()->input())->links()}}
                    </div>
                </div>
                {{--<template>
                    <el-table :data="tableData3" style="width: 100%">
                        <el-table-column type="expand">
                            <template scope="props">
                                <div class="col-md-12 noPadding" style="padding-bottom: 15px">
                                    <div class="col-md-6 noPadding">
                                        <img :src="props.row.img" alt="Event Picture" style="width:100%">
                                    </div>
                                </div>
                                <p><b>Title:</b> @{{ props.row.title }}</p>
                                <p><b>Description:</b> @{{ props.row.description }}</p>
                                <p><b>Date:</b> @{{ props.row.date }}</p>
                                <p><b>Time:</b> @{{ props.row.time }}</p>
                            </template>
                        </el-table-column>
                        <el-table-column label="Date" prop="date">
                        </el-table-column>
                        <el-table-column label="Title" prop="title">
                        </el-table-column>
                        <el-table-column label="Operations">
                            <template scope="scope">
                                <el-button
                                        size="small"
                                        type="info"
                                        @click="move(scope.row.id)">View</el-button>
                                @if(auth()->user()->is_admin() || auth()->user()->is_superadmin())
                                <el-button
                                        size="small"
                                        type="danger"
                                        @click="window.location.href='/'">Delete</el-button>
                                @endif
                            </template>
                        </el-table-column>
                    </el-table>
                </template>--}}
            </div>
        </div>
        @if($events->count()===0)
            <div class="col-md-12 noPadding bg-white roundedCorners text-center" style="position: static !important;">
                <h1 class="glyphicon glyphicon-warning-sign" style="color: orangered; text-shadow: 5px 5px 5px #333"></h1>
                <h2>Looks like there are no user accounts registered in our Database. If you think that this is a mistake,
                    please contact your system maintenance personnel to correct this. Otherwise you may go to the <a
                            href="/accounts/create">accounts creation page</a> to register new accounts!</h2>
            </div>
        @endif
    </div>
    <script>
        var events = {!! json_encode($events) !!};
        var Main = {
            data() {
                return {
                    tableData3: events
                }
            },
            methods: {
                move: function (id) {
                    window.location.href = '/events/' + id
                }
            }
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
