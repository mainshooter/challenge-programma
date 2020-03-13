@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{ URL::previous() }}" class="btn btn-primary">Terug</a>
                <div class="card">
                    <div class="card-header">Student details</div>
                    <div class="card-body">
                      <h4>NAW</h4>
                      <ul class="list-unstyled">
                        <li>Voornaam {{ $oUser->firstname }}</li>
                        <li>Tussenvoegsel {{ $oUser->middlename }}</li>
                        <li>Achternaam {{ $oUser->lastname }}</li>
                        <li>Leerjaar {{ $oUser->studentInfo->school_year }}</li>
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
    </div>
@endsection
