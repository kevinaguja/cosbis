@extends('prints.layout')

@section('content')
    <div class="col-md-12 noPadding">
        <div class="col-md-12 noPadding tableDiv">
            <table class="noBorder" style="width:100%">
                <tr>
                    <td style="width: 30%"><b>EVENT</b></td>
                    <td style="width: 10%"><b>:</b></td>
                    <td style="width: 60%">{{ucwords(strtolower($event->title))}}</td>
                </tr>
                <tr>
                    <td><b>DATE</b></td>
                    <td><b>:</b></td>
                    <td>{{Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</td>
                </tr>
                <tr>
                    <td><b>TIME</b></td>
                    <td><b>:</b></td>
                    <td>{{Carbon\Carbon::parse($event->time)->format('g:i A')}}</td>
                </tr>
                <tr>
                    <td><b>LOCATION</b></td>
                    <td><b>:</b></td>
                    <td>{{$event->location}}</td>
                </tr>
                <tr>
                    <td><b>THEME</b></td>
                    <td><b>:</b></td>
                    <td>{{ucwords(strtolower($event->theme))}}</td>
                </tr>
                <tr>
                    <td><b>TYPE</b></td>
                    <td><b>:</b></td>
                    <td>{{ucwords(strtolower($event->type))}}</td>
                </tr>
                @if($event->organization_id!=null)
                    <tr>
                        <td><b>ORGANIZATION</b></td>
                        <td><b>:</b></td>
                        <td>{{$event->organization->name .'('.$event->description.')'}}</td>
                    </tr>
                @endif
            </table>
            <br>
            <div class="col-md-12 noPadding" style="border-top: 1px double black">
                <br>
                <h5><b>DESCRIPTION:</b></h5><br>
                <p style="text-indent: 3em">{{$event->description}}</p>
            </div>
        </div>
    </div>
@endsection