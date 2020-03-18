@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Aanwezigheid afvinken event {{ $oEvent->name }}</h1>
        <form method="post">
          <table class="table">
            <thead>
              <tr>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Achternaam</th>
                <th>Is aanwezig</th>
              </tr>
            </thead>
            <tbody>
              @foreach($oEvent->students as $oUser)
                <tr>
                  <td>{{ $oUser->firstname }}</td>
                  <td>{{ $oUser->middlename }}</td>
                  <td>{{ $oUser->lastname }}</td>
                  <td>
                    <input type="checkbox" name="present_user[]" value="{{ $oUser->id }}">
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <input type="submit" value="Opslaan" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
@endsection
