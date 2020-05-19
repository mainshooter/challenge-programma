@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ URL::previous() }}" class="btn btn-primary">Terug</a>
                <h1>Evenementen van {{$oUser->firstname}} @if(!is_null($oUser->middlename)) {{$oUser->middlename}} @endif {{$oUser->lastname}}:</h1>
                <div class="card">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Evenement</th>
                            <th>Begindatum</th>
                            <th>Einddatum</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($oUser->organisingEvents as $oEvent)
                            <tr>
                                <td>{{$oEvent->name}}</td>
                                <td>{{$oEvent->event_start_date_time}}</td>
                                <td>{{$oEvent->event_end_date_time}}</td>
                                <td>{{$oEvent->event_status}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">Bedrijf details</div>
                    <div class="card-body">
                      <h4>NAW</h4>
                      <ul class="list-unstyled">
                        <li>Bedrijf: {{ $oUser->companyInfo->company_name }}</li>
                        <li>Voornaam: {{ $oUser->firstname }}</li>
                        <li>Tussenvoegsel: {{ $oUser->middlename }}</li>
                        <li>Achternaam: {{ $oUser->lastname }}</li>
                      </ul>

                      <h4>Adress</h4>
                      <ul class="list-unstyled">
                        <li>{{ $oUser->companyInfo->street }}{{ $oUser->companyInfo->house_number }}{{ $oUser->companyInfo->house_number_addition }}</li>
                        <li>{{ $oUser->companyInfo->zipcode }}, {{ $oUser->companyInfo->city }}</li>
                      </ul>

                      <h4>Contact gegevens</h4>
                      <ul class="list-unstyled">
                        <li>Mail: <a href="mailto:{{ $oUser->email }}">{{ $oUser->email }}</a></li>
                        <li>Telefoon: <a href='tel:{{ $oUser->phone }}'>{{ $oUser->phone }}</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
