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
                </table>
                <td><a href="{{ route('profile.terminate')}}" class="btn btn-danger">Uitschrijven</a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
