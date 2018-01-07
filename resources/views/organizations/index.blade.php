@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
    <link rel="stylesheet" href="{{asset('css/organization.css')}}">
@endsection

@section('navigation')
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="margin-top: 10px" id="app">
        <div class="col-md-12 bg-white">
            <div class="container" style="border:none; height: auto">
                <div class="jumbotron trim_padding">
                    <div class="col-md-9 col-md-offset-3">
                        <h1><b>We are the Benildean Student <span><u>Organizations</u></span></b></h1>
                    </div>
                </div>
                {{--<div class="col-md-12 text-center" style="background-color: green">
                    <h3 class="organization_h3">List of Official School Organzations</h3>
                </div>--}}
                <div class="col-md-12" id="cards">
                    <div class="col-md-4" v-for="org in orgs">
                        <el-card :body-style="{ padding: '0px' }">
                            <div class="col-md-12 noPadding noMargin card_container">
                                <img :src="org.img" class="image">
                            </div>
                            <div style="padding: 14px;">
                                <span><b>@{{ org.description }}</b></span>
                                <div class="bottom clearfix">
                                    <org-name class="org_name">@{{ org.name}}</org-name>
                                    <a class="pull-right" :href="'/organizations/' + org.name">View Events</a>
                                </div>
                            </div>
                        </el-card>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var organizations= {!! json_encode($organizations) !!};
        new Vue({
            el: '#cards',
            data: {
                orgs: organizations,
            }
        })
    </script>
@endsection
