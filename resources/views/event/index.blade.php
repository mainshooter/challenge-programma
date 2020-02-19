@extends('layout')

@section('content')
  <div class="col-12">
    <a href="#" class="btn btn-primary">
      Event toevoegen
    </a>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Naam</th>
          <th>Datum</th>
          <th>Adres</th>
          <th>Punten</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($aEvents as $oEvent)
          <tr>
            <td>{{$oEvent->id}}</td>
            <td>{{$oEvent->name}}</td>
            <td>{{$oEvent->date}}</td>
            <td>{{$oEvent->street}} {{$oEvent->house_number}}, {{$oEvent->city}}</td>
            <td>{{$oEvent->points}}</td>
            <td>
              <a href="#" class="btn btn-primary">Bewerk</a>
              <a href="#" class="btn btn-danger">Verwijder</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
