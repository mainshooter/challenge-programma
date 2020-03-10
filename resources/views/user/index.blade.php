@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($aUsers as $User)
                    <tr>
                        <td>{{$User->id}}</td>
                        <td>{{$User->name}}</td>
                        <td>{{$User->email}}</td>
                        <td>
                            <a href="{{ route('user.editPage', $User->id) }}" class="btn btn-primary">Bewerken</a>
                            <a href="#">Verwijderen</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
