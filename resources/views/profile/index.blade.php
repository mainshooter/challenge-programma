@extends('layout')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profilePage.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="container no-max-width">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Volgende Evenementen:</h1>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Bedrijfsnaam</th>
                        <th>Begindatum</th>
                        <th>Einddatum</th>
                        <th>Naar Detail pagina</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($oUser->events as $oEvent)
                    <td>{{$oEvent->name}}</td>
                    <td>{{$oEvent->event_start_date_time}}</td>
                    <td>{{$oEvent->event_end_date_time}}</td>
                    <td>
                        <a href="{{route('event.details', $oEvent->id)}}" class="btn btn-info">Details</a>
                    </td>
                    @endforeach
                </tbody>
            </table>
            <td><a href="{{ route('profile.terminate')}}" class="btn btn-danger">Uitschrijven</a>
        </div>
        <div class="col-2"></div>
    </div>

    <div class='row justify-content-center'>
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-header">
                    Behaalde punten (certificaat/vsr)
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Type
                                </th>
                                <th scope="col">
                                    Aantal behaalde punten
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $pointsType }}
                                </td>
                                <td>
                                    {{ $points }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection