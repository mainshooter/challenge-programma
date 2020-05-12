@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('user.index')}}" class="btn btn-primary">Terug</a>
                <div class="card">
                    <div class="card-header">Weet je zeker dat je deze gebruiker wilt verwijderen?</div>
                    <div class="card-body">
                        <h4>NAW</h4>
                        <ul class="list-unstyled">
                            <li>Voornaam: {{ $oUser->firstname }}</li>
                            <li>Tussenvoegsel: {{ $oUser->middlename }}</li>
                            <li>Achternaam: {{ $oUser->lastname }}</li>
                        </ul>

                        <h4>Contact gegevens</h4>
                        <ul class="list-unstyled">
                            <li>Mail: <a href="mailto:{{ $oUser->email }}">{{ $oUser->email }}</a></li>
                        </ul>
                            <a href="{{ route('user.deleteExisting', $oUser->id) }}" class="btn btn-danger">Verwijderen</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
