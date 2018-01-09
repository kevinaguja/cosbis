@extends('layouts.master')

@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="col-md-10 col-md-offset-1 panel panel-default" style="padding: 25px;">
            <div class="col-md-12">
                <h1 style="color: red"><b>This account has been suspended</b></h1>
                <hr class="dark-hr">
            </div>

            <div class="col-md-12">
                <div class="col-md-9">
                    <h4><b>Your account has been flagged down by the administrators of the site</b></h4>
                    <p>You may not be able to visit the page because of:</p>
                    <ul>
                        <li>existing <b>school violations</b></li>
                        <li>a <b>delinquent site record</b></li>
                        <li>User level priviledges <b>(Unauthorized access)</b></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <p>Go to the Home Page</p>
                    <button type="button" class="btn btn-default" onclick="window.location.href='/'"><span class="glyphicon glyphicon-home"></span> Home Page</button>
                </div>

                <div class="col-md-12">
                    <hr>
                    <p>If difficulties persists, please contact the System Admistrator of this site.</p>
                </div>
            </div>
        </div>

    </div>
@endsection
