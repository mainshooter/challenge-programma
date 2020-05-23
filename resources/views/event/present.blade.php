@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <button type="button" class="btn btn-primary">
          <a href="{{ route('event.index') }}">Terug</a>
        </button>
        <h1>Aanwezigheid afvinken event {{ $oEvent->name }}</h1>
        @component('component/formError')
        @endcomponent
        <form method="post">
          @csrf
          <div class="table-responsive">
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
                      @if ($oUser->pivot->was_present == true)
                        <input type="checkbox" name="present_user[]" value="{{ $oUser->id }}" checked>
                      @else
                        <input type="checkbox" name="present_user[]" value="{{ $oUser->id }}">
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <input type="submit" value="Opslaan" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
@endsection
