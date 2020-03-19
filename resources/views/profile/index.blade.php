@extends('layout')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <label>Studentlabel</label>
                <label>Volgende Evenementen:</label>
                <table class="table table-dark">
                    <p/>
                    <thead>
                    <tr>
                        <th>Bedrijf</th>
                        <th>datum</th>
                    </tr>
                    </thead>
                </table>
                <td><a href="{{ route('profile.terminate', $oUser->id)}}" class="btn btn-danger">Uitschrijven</a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
