@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Voornaam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($aUsers as $User)
                    <tr>
                        <td>{{$User->id}}</td>
                        <td>{{$User->firstname}}</td>
                        <td>{{$User->middlename}}</td>
                        <td>{{$User->lastname}}</td>
                        <td>{{$User->email}}</td>
                        <td>
                            <a href="{{ route('user.edit', $User->id) }}" class="btn btn-primary">Bewerken</a>
                            <!-- Sprint 2 <a href="#">Verwijderen</a>-->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
