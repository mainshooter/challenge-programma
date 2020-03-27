@extends('layout')

@section('content')
<div class="container no-max-width">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <a href="{{ route('event.create') }}" class="btn btn-primary">
        Event toevoegen
      </a>
        <h2>Goedgekeurde evenementen</h2>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Naam</th>
            <th>Start op</th>
            <th>Adres</th>
            <th>Postcode</th>
            <th>Punten</th>
            <th>Max studenten</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($aEventsAccepted as $oEvent)
            <tr>
              <td>{{$oEvent->id}}</td>
              <td>{{$oEvent->name}}</td>
              <td>{{$oEvent->event_start_date_time}}</td>
              <td>{{$oEvent->street}} {{$oEvent->house_number}}, {{$oEvent->city}}</td>
              <td>{{$oEvent->zipcode}}</td>
              <td>{{$oEvent->points}}</td>
              <td>{{ $oEvent->max_students }}</td>
              <td>
                <button type="button" class="btn btn-success">
                  <a href="{{ route('event.present', $oEvent->id) }}" >Aanwezigheid</a>
                </button>
                <a href="{{route('event.details', $oEvent->id)}}" class="btn btn-info">Details</a>
                <a href="{{ route('event.edit', $oEvent->id) }}" class="btn btn-primary">Bewerk</a>
                <a href="{{ route('event.delete', $oEvent->id) }}" class="btn btn-danger">Verwijder</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

        <h2>Openstaande evenementen</h2>
        <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Naam</th>
                <th>Start op</th>
                <th>Adres</th>
                <th>Postcode</th>
                <th>Punten</th>
                <th>Max studenten</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            @foreach($aEventsOpen as $oEvent)
              <tr>
                <td>{{$oEvent->id}}</td>
                <td>{{$oEvent->name}}</td>
                <td>{{$oEvent->event_start_date_time}}</td>
                <td>{{$oEvent->street}} {{$oEvent->house_number}}, {{$oEvent->city}}</td>
                <td>{{$oEvent->zipcode}}</td>
                <td>{{$oEvent->points}}</td>
                <td>{{ $oEvent->max_students }}</td>
                <td>
                    <a href="{{route('event.details', $oEvent->id)}}" class="btn btn-info">Details</a>
                    <a href="{{ route('event.edit', $oEvent->id) }}" class="btn btn-primary">Bewerk</a>
                    <a href="{{ route('event.delete', $oEvent->id) }}" class="btn btn-danger">Verwijder</a>
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
