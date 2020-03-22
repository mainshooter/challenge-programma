@extends('layout')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Inschrijven voor event: {{ $oEvent->name }}</h1>
        <p>{{ $oEvent->description }}</p>
        <div class="row">
          <div class="col-9">
            <div class="card">
              <div class="card-header">
                Evenement gegevens
              </div>
              <div class="card-body">
                <p class="card-text">Punt(en): {{ $oEvent->points }}</p>
              </div>
              <div class="card-body">
                <p class="card-text">
                  {{ $oEvent->street }} {{ $oEvent->house_number }}{{ $oEvent->house_number_addition }}
                  <br>
                  {{ $oEvent->city }} {{ $oEvent->zipcode }}
                </p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Begin tijd: {{ $oEvent->event_start_date_time }}</li>
                <li class="list-group-item">Eind tijd: {{ $oEvent->event_end_date_time }}</li>
              </ul>
              <div class="card-body">
                <form method="post" action="{{ route('event.register.student.post', $oEvent->id) }}">
                  @csrf
                  <input type="submit" class="btn btn-primary col-12" value="Inschrijven">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
