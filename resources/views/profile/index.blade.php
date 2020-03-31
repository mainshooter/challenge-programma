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
                        <tr>
                            <td>{{$oEvent->name}}</td>
                            <td>{{$oEvent->event_start_date_time}}</td>
                            <td>{{$oEvent->event_end_date_time}}</td>
                            <td>
                                <a href="{{route('event.details', $oEvent->id)}}" class="btn btn-info">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h1>Evenementen die jij aan het organiseren bent:</h1>
                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>Evenement</th>
                        <th>Begindatum</th>
                        <th>Einddatum</th>
                        <th>Status</th>
                        <th>Maximale studenten</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($oUser->organisingEvents as $oEvent)
                        @if($oEvent->organiser->id == Auth::user()->id)
                            <tr>
                                <td>{{$oEvent->name}}</td>
                                <td>{{$oEvent->event_start_date_time}}</td>
                                <td>{{$oEvent->event_end_date_time}}</td>
                                <td>{{$oEvent->event_status}}</td>
                                <td>{{$oEvent->max_students}}</td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger">
                  <a href="{{ route('profile.terminate')}}">Uitschrijven</a>
                </button>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
