@extends('prints.layout')

@section('content')
    <div class="col-md-12">
        <div class="col-md-12">
            <h6><b>Election Results for {{now()->year}}</b></h6>
            <h6><b>College of San Benildo- Rizal</b></h6>
            <table>
                <thead >
                    <tr>
                        <th></th>
                        <th>Candidate Name</th>
                        <th>Position</th>
                        <th>No. of Votes</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($candidates as $index => $candidate)
                    <tr>
                        <td style="text-align: center">{{ $index +1 }}</td>
                        <td>{{ucwords(strtolower($candidate->user->firstname.' '.$candidate->user->lastname))}}</td>
                        <td>{{ucwords(strtolower($candidate->position->name))}}</td>
                        <td>{{$candidate->userVote->count()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <h6><b>Print Copy Request By: </b>{{auth()->user()->firstname}} {{auth()->user()->lastname}}</h6>
            <h6><b><span class="glyphicon glyphicon-copyright-mark"></span> Cosbr</b> {{now()->year}}</h6>
        </div>
    </div>
@endsection