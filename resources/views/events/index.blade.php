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
        <div class="col-md-12 col-sm-12 bg-white">
            <div class="col-md-12 dark-bottom-border">
                <div>
                    <h3><b>Events - <small>Regularly check on the events lists in order to avoid missing out on all of the campus fun</small></b></h3>
                    <div class="green-bottom-border col-md-2 col-xs-3"></div>
                </div>
            </div>

            <div class="col-md-12" id="app" style="padding-bottom: 25px">
                <button class="btn eventsBtn" style="margin-bottom: 15px" onclick="window.location.href='/suggestions/mysuggestions'"><b><span class="glyphicon glyphicon-book" style="color: green"></span> My Suggested Events</b></button>
                <button class="btn eventsBtn" style="margin-bottom: 15px" onclick="window.location.href='/events/create'"><b><span class="glyphicon glyphicon-pencil" style="color: green"></span> Suggest an Event</b></button>
                <template>
                    <el-table :data="tableData3" style="width: 100%">
                        <el-table-column type="expand">
                            <template scope="props">
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
                </template>
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
