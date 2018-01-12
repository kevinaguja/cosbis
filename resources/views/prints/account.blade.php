@extends('prints.layout')

@section('content')
    <div class="col-md-12 noPadding">
        <div class="col-md-12 noPadding">
            <div class="col-md-12 noPadding noMargin" style="margin-bottom: 0">
                <p class="col-xs-6 noMargin noPadding"><b>NAME:</b><span> {{ucwords(strtolower($account->firstname.' '.$account->lastname))}}</span></p>
                <p class="col-xs-6 noMargin noPadding"><b>STUDENT NUMBER:</b><span> {{$account->student_number}}</span></p>
            </div>
            <div class="col-md-12 noPadding">
                <p class="col-md-12 noMargin noPadding"><b>ADDRESS:</b><span> {{$account->address}}</span></p>
            </div>
            <div class="col-md-12 noPadding">
                <p class="col-xs-4 noMargin noPadding"><b>BIRTHDATE:</b><span> {{\Carbon\Carbon::parse($account->birthdate)->toFormattedDateString()}}</span></p>
                <p class="col-xs-4 noMargin noPadding"><b>EMAIL:</b><span> {{$account->email}}</span></p>
                <p class="col-xs-4 noMargin noPadding"><b>PHONE:</b><span> {{$account->phone}}</span></p>
            </div>
        </div>
        <div class="col-md-12 noPadding"><br><br><br>
            <div class="noPadding col-md-12" style="border-bottom: 1px double black;"></div>
            <div class="col-md-12 noPadding">
                <br>
                <div class="col-md-12 noPadding">
                    <h5><b>Event Contributions</b></h5>
                </div>
                <div class="col-md-12">
                    <table style="width: 100%">
                        <thead>
                            <tr>
                                <th style="width: 5%"></th>
                                <th style="width: 20%">Title</th>
                                <th style="width: 15%">Status</th>
                                <th style="width: 15%">Event Date</th>
                                <th style="width: 45%">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $index => $event)
                                <tr>
                                    <td class="text-center">{{$index +1}}</td>
                                    <td>{{$event->title}}</td>
                                    <td>{{ucwords(strtolower($event->status))}}</td>
                                    <td>{{Carbon\Carbon::parse($event->date)->toFormattedDateString()}}</td>
                                    <td>{{$event->description}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection