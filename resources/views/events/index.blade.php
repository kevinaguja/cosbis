@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
@endsection
@section('navigation')
@endsection
@section('content')
    <div class="col-md-12">
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white">
            {{--<div class="col-md-12 dark-bottom-border">
                <div>
                    <h3><b>Events - <small>Regularly check on the events lists in order to avoid missing out on all of the campus fun</small></b></h3>
                    <div class="green-bottom-border col-md-2 col-xs-3"></div>
                </div>
            </div>--}}
            <div class="container" id="app" style="padding-bottom: 25px; padding-top: 25px; border: none; height: auto">
                <div class="col-md-4 col-xs-5">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <button class="btn btn-danger pull-right" style="margin-bottom: 15px; margin-right: 15px" onclick="window.location.href='/events/create'"><b><span class="glyphicon glyphicon-pencil" style="color: white"></span> Suggest an Event</b></button>
                @foreach($events as $event)
                    <div class="col-md-12" style="margin-bottom: 25px">
                        <div class="col-md-12 noPadding">
                            <img src="{{$event->img}}" alt="News Image" style="width: 100%">
                            <hr>
                            <h4><b> {{$event->title}}</b> <br> <small style="color: grey">({{Carbon\Carbon::parse($event->date)->toFormattedDateString()}} - {{$event->time}}) {{Carbon\Carbon::parse($event->date)->diffForHumans()}}</small></h4>
                            <h6 style="color: grey"><b> By: {{$event->user->firstname}} {{$event->user->lastname}}</b></h6>
                            <h4 class="dashDetails" style="color: #000;">
                                <small>
                                    {{$event->description}}
                                </small>
                            </h4>
                            <button class="btn btn-primary pull-right" onclick="window.location.href='events/{{$event->id}}'">Read more</button>
                        </div>
                    </div>
                @endforeach
                <div class="col-md-12 text-right">
                    {{$events->links()}}
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
