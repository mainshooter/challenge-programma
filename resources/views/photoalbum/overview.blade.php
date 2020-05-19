@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-primary">
          <a href="{{ route('photoalbum.create') }}">Fotoalbum toevoegen</a>
        </button>
        <table class="table sorting-table">
          <thead>
            <tr>
              <th>#</th>
              <th>Naam</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($aPhotoalbums as $oPhotoalbum)
              <tr>
                <td>{{ $oPhotoalbum->id }}</td>
                <td>{{ $oPhotoalbum->name }}</td>
                <td>
                  <button type="button" class="btn btn-info">
                    <a href="{{ route('photoalbum.edit', $oPhotoalbum->id) }}">Bewerken</a>
                  </button>
                  <a class="btn btn-danger" href="{{ route('photoalbum.delete', $oPhotoalbum) }}">
                    Verwijderen
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
