@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table sorting-table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Voornaam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($aUsers as $oUser)
                    <tr>
                        <td>{{$oUser->id}}</td>
                        <td>{{$oUser->firstname}}</td>
                        <td>{{$oUser->middlename}}</td>
                        <td>{{$oUser->lastname}}</td>
                        <td>{{$oUser->email}}</td>
                        <td>{{ $oUser->dutch_role }}</td>
                        <td>
                            <a href="{{ route('user.edit', $oUser->id) }}" class="btn btn-primary">Bewerken</a>
                            <!-- Sprint 2 <a href="#">Verwijderen</a>-->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('user.create') }}" class="btn btn-primary">Gebruiker aanmaken</a>
        </div>
    </div>
</div>
@endsection
