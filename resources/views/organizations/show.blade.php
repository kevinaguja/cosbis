@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/organization.css')}}">
@endsection

@section('navigation')
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="margin-top: 10px" id="app">
        <div class="col-md-12 noPadding">
            <div class="col-md-12 noPadding noMargin eventBannerDiv text-center roundedCorners" style="background-color: #2F3133">
                <img src="{{$organization->img}}" alt="" style="width:100%; max-width: 1000px">
            </div>

            <div class="col-md-12 bg-white roundedCorners" style="margin-top: 10px; padding-bottom: 10px">
                <h5><b>Name of Organization: </b>{{$organization->name}} - {{$organization->description}}</h5>
                <h5><b>Created on: </b>{{Carbon\Carbon::parse($organization->created_at)->toDayDateTimeString()}}</h5>
                <h5><b>Last Update on: </b>{{Carbon\Carbon::parse($organization->updated_at)->diffForHumans()}}</h5>
                <h5><b>Organization Logo</b></h5>
                <img src="{{$organization->logo}}" alt="" style="width: 200px" class="img-thumbnail">
            </div>

            <div class="col-md-12 bg-white roundedCorners">

                <template>
                    <div>
                        <vue-good-table
                                :columns="columns"
                                :rows="rows"
                                :paginate="true"
                                :lineNumbers="true"
                                styleClass="table table-bordered table-striped condensed">
                            <template slot="table-row" scope="scope">
                                <td class="has-text-right"><a :href="'/events/'+scope.row.id"><span class="glyphicon glyphicon-eye-open" style="color: blue"></span> View</a></td>
                                <td class="has-text-right">@{{ scope.row.title}}</td>
                                <td class="has-text-right">@{{ scope.row.description}}</td>
                                <td class="has-text-right">@{{ scope.row.status}}</td>
                                <td class="has-text-right">@{{ scope.row.date}}</td>
                            </template>
                        </vue-good-table>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <script>
        var events= {!! json_encode($organization->events) !!};
        var Main = {
            data() {
                return {
                    tableData: events,
                    columns: [
                        {
                            label: 'ID',
                            sortable: 'true',
                            field: 'id'
                        },
                        {
                            label: 'Title',
                            sortable: 'true',
                            field: 'title',
                            filterable: true
                        },
                        {
                            label: 'Description',
                            sortable: 'true',
                            field: 'description',
                            filterable: true
                        },
                        {
                            label: 'Status',
                            sortable: 'true',
                            field: 'status',
                        },
                        {
                            label: 'Date',
                            sortable: 'true',
                            field: 'date',
                        }
                    ],
                    rows: events
                }
            },
        }
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
