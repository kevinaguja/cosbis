@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/accounts.css')}}">
    <link rel="stylesheet" href="{{asset('css/organization.css')}}">
    <style>
        @import url("//unpkg.com/element-ui@2.0.10/lib/theme-chalk/index.css");

        .el-carousel__item h3 {
            color: #475669;
            font-size: 15px;
            opacity: 0.75;
            margin: 0;
            text-indent: 20px;
        }

        .el-carousel__item:nth-child(2n) {
            background-color: #99a9bf;
        }

        .el-carousel__item:nth-child(2n+1) {
            background-color: #d3dce6;
        }

        .background_img{
            height: 175px;
            background-color: #555;
            text-align: center;
        }
    </style>
@endsection

@section('navigation')
@endsection

@section('content')
    <div class="col-md-12 noPadding" style="margin-top: 10px" id="app">
        <div class="col-md-12 bg-white">
            <div class="container" style="border:none; height: auto; overflow: hidden; max-width: 100%">
                <div class="jumbotron trim_padding">
                    <div class="col-md-9 col-md-offset-3">
                        <h1><b>We are the Benildean Student <span><u>Organizations</u></span></b></h1>
                    </div>
                </div>

                <div class="col-md-12" style="margin-bottom: 50px">
                    <template>
                        <el-carousel :interval="4000" type="card" height="250px" width: auto>
                            <el-carousel-item v-for="org in orgs" :key="org">
                                <div class="col-md-12 background_img">
                                    <img :src="org.img" alt="" style="max-width: 100%; max-height: 100%">
                                </div>
                                <h3><b>@{{ org.name }}</b></h3>
                                <h3><b>@{{ org.description }}</b></h3>
                                <h3>
                                    <a :href="'/organizations/' + org.name">View Events</a>
                                </h3>
                            </el-carousel-item>
                        </el-carousel>
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script>
        var organizations = {!! json_encode($organizations) !!};

        var Main = {
            data() {
                return {
                    orgs: organizations
                }
            }
        };
        var Ctor = Vue.extend(Main)
        new Ctor().$mount('#app')
    </script>
@endsection
