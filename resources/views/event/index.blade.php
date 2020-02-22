@extends('layout')

@section('content')
<div class="container no-max-width">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <a href="{{ route('event.create') }}" class="btn btn-primary">
        Event toevoegen
      </a>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Naam</th>
            <th>Start op</th>
            <th>Adres</th>
            <th>Postcode</th>
            <th>Punten</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($aEvents as $oEvent)
            <tr>
              <td>{{$oEvent->id}}</td>
              <td>{{$oEvent->name}}</td>
              <td>{{$oEvent->event_start_date_time}}</td>
              <td>{{$oEvent->street}} {{$oEvent->house_number}}, {{$oEvent->city}}</td>
              <td>{{$oEvent->zipcode}}</td>
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
    <div class="col-2"></div>
  </div>
</div>
@endsection
