@extends('layout')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h1>Volgende Evenementen:</h1>
                <table class="table table-dark">
                    <p/>
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
    </div>
@endsection
