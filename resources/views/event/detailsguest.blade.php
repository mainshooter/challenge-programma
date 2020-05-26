@extends('layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/eventdetails.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 detailContainer">
            <div class="card">
                <div class="card-header">Evenement details</div>
                <div class="card-body">
                    <h2>Evenement naam: {{$oEvent->name}}</h2>
                    @if($oEvent->organiser != null)
                    <h5>Aanvrager: <a href="{{ route('user.details', $oEvent->organiser->id) }}">{{ $oEvent->organiser->firstname }} {{ $oEvent->organiser->middlename }} {{ $oEvent->organiser->lastname }}</a></h5>
                    @endif
                    <br>
                    <h6>Start datum: {{$oEvent->event_start_date_time}}</h6>
                    <h6>Eind datum: {{$oEvent->event_end_date_time}}</h6>
                    <br>
                    <h5>Locatie:</h5>
                    <h6>{{$oEvent->street}} {{$oEvent->house_number}} {{$oEvent->house_number_addition}}</h6>
                    <h6>{{$oEvent->city}} {{$oEvent->zipcode}}</h6>
                    <br>
                    <h6>Te verdienen punten: {{$oEvent->points}}</h6>
                    <br>
                    <h5>Beschrijving:</h5>
                    <h6>{{$oEvent->description}}</h6>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
