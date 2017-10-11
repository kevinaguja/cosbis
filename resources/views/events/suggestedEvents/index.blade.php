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
        <div class="col-md-12 col-sm-12 col-xs-12 bg-white" style="padding-top: 25px">
            @if(session()->has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success col-md-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('success')}}
                    </div>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="col-md-12">
                    <div class="alert alert-danger col-md-12">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('error')}}
                    </div>
                </div>
            @endif
            <div class="col-md-12" id="app" style="padding-bottom: 25px">
                <div class="col-md-7 noPadding">
                    <div class="col-md-6 col-xs-6">
                        <button class="btn btn-primary form-control" style="margin-bottom: 15px;" onclick="window.location.href='/suggestions/mysuggestions'"><b><span class="glyphicon glyphicon-book" style="color: white"></span> My Events</b></button>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <button class="btn btn-danger form-control" style="margin-bottom: 15px" onclick="window.location.href='/events/create'"><b><span class="glyphicon glyphicon-pencil" style="color: white"></span> Suggest an Event</b></button>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 pull-right noPadding" style="margin-bottom: 10px;">
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <form action="/events" method="POST" id="form">
                    {{csrf_field()}}

                    <input type="hidden" name="vote" id="vote">
                </form>
                <template>
                    <el-table :data="tableData3" style="width: 100%">
                        <el-table-column type="expand">
                            <template scope="props">
                                <div class="col-md-12 noPadding" style="padding-bottom: 15px">
                                    <div class="col-md-6 noPadding">
                                        <img :src="props.row.img" alt="Event Picture" style="width:100%">
                                    </div>
                                </div>
                                <p><b>Title:</b> @{{ props.row.title }}</p>
                                <p v-if="props.row.organization_id == null"><b>Author:</b> @{{ props.row.user.firstname }} @{{ props.row.user.lastname }}</p>
                                <p v-if="props.row.organization_id !== null"><b>Author:</b> @{{ props.row.organization.name }}</p>
                                <p><b>Description:</b> @{{ props.row.description }}</p>
                                <p><b>Date:</b> @{{ props.row.formattedDate }}</p>
                                <p><b>Time:</b> @{{ props.row.time }}</p>
                            </template>
                        </el-table-column>
                        <el-table-column label="Title" prop="title">
                        </el-table-column>
                        <el-table-column label="Author">
                            <template scope="scope">
                                <p><b>@{{ scope.row.user.firstname }} @{{ scope.row.user.lastname }}</b></p>
                            </template>
                        </el-table-column>
                        <el-table-column label="Operations">
                            <template scope="scope">
                                <el-button
                                        size="small"
                                        type="info"
                                        @click="move(scope.row.id)">View</el-button>
                                <el-button
                                        v-if="!scope.row.hasVoted"
                                        size="small"
                                        type="success"
                                        @click="vote(scope.row.id, 1)">Huzzah!</el-button>
                                <el-button
                                        v-if="!scope.row.hasVoted"
                                        size="small"
                                        type="danger"
                                        @click="vote(scope.row.id, 0)">Boo!</el-button>
                            </template>
                        </el-table-column>
                    </el-table>
                </template>
            </div>
        </div>
    </div>

    <script>
        var suggestedEvents= {!! json_encode($events) !!}

        var Main = {
                data() {
                    return {
                        tableData3: suggestedEvents
                    }
                },
                methods: {
                    move: function(id){
                        window.location.href='/events/' + id
                    },
                    vote: function(id, vote){
                        $('#vote').val(vote);
                        $('#form').attr('action', '/events/' + id + '/vote').submit();
                    }
                }
            }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
