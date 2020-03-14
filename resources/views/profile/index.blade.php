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
                   {{-- <tbody>

                    @foreach($aModules as $oModule)
                        <tr>
                            <td>{{$oModule->id}}</td>
                            <td>{{$oModule->module_name}}</td>
                            <td>{{$oModule->module_description}}</td>
                            <td>{{$oModule->coordinator}}</td>
                            <td>{{$oModule->is_my_teacher}}</td>
                            <td>
                                <a href="{{ route('module.edit', $oModule->id) }}" class="btn btn-primary">Bewerk</a>
                            </td>
                            <td><a href="{{ route('module.delete', $oModule->id) }}" class="btn btn-danger">Verwijder</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>--}}
                </table>
                <td><a href="{{ route('profile.terminate') }}" class="btn btn-danger">Uitschrijven</a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
