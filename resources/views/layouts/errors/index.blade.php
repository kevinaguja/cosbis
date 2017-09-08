@extends('layouts.master')

@section('navigation')
    @include('layouts.navbar')
@endsection

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1 panel panel-default" style="padding: 25px;">
            <div class="col-md-12">
                <h1><b>The requested page can't be found</b></h1>
                <hr class="dark-hr">
            </div>

            <div class="col-md-12">
                <div class="col-md-9">
                    <h4><b>An error has occurred while processing your request. </b></h4>
                    <p>You may not be able to visit the page because of:</p>
                    <ul>
                        <li>an <b>out-of-date bookmark/favourite</b></li>
                        <li>a <b>mistyped address</b></li>
                        <li><b>Unauthorized access</b> to a bar you do not own</li>
                        <li>User level priviledges <b>(Unauthorized access)</b></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <p>Go to the Home Page</p>
                    <button type="button" class="btn btn-default" onclick="window.location.href='/'"><span class="glyphicon glyphicon-home"></span> Home Page</button>
                </div>

                <div class="col-md-12">
                    <hr>
                    <p>If difficulties persists, please contact the System Admistrator of this site and report the error below.</p>
                    <p style="border-left: 5px solid #8c8c8c; margin-left: 7px; text-indent: 0.5em;">404 Component not found</p>
                </div>
            </div>
        </div>

    </div>
@endsection
