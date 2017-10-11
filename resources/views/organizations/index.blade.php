@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('css/organization.css')}}">
@endsection

@section('navigation')
    @include('layouts.navigationadmin')
@endsection

@section('content')
    @include('layouts.sidebar')
    <div class="cms-wrapper">
        <div class="col-md-12 col-xs-12 col-sm-12 bg-white noPadding noMargin">
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
                                <el-button v-if="user_orgs.includes(org.id)" type="text" class="button" @click="window.location.href='/organizations/' + org.id"><b>Visit</b></el-button>
                                <el-button v-if="!user_orgs.includes(org.id)" type="text" class="button" @click="window.location.href='/organizations/' + org.id + '/join'"><b>Join</b></el-button>
                            </div>
                        </div>
                    </el-card>
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-3 col-md-offset-9">
                    <button class="btn btn-success form-control"><span class="glyphicon glyphicon-th-list"></span> Org Events</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var organizations= {!! json_encode($organizations) !!};
        var user_organizations= {!! json_encode($user_orgs) !!};
        new Vue({
            el: '#cards',
            data: {
                orgs: organizations,
                user_orgs: user_organizations
            }
        })
    </script>
@endsection
