@extends('layout')

@section('head')
<script src="{{ asset('js/profile.js') }}" defer></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/profilePage.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="container no-max-width">
    <div class="float-right">
        <form method="post">
            @csrf
            <label id="selectLabel" class="{{$sSortType}}">Sorteren op:</label>
            <select name="selectSort" class="form-control" id="selectBox">
                <option value="all">
                    Alle evenementen
                </option>
                <option value="futureevents">
                    Sorteer op toekomstige evenementen
                </option>
            </select>
        </form>
    </div>
    <br>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Volgende Evenementen:</h1>
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Bedrijfsnaam</th>
                          <th>Begindatum</th>
                          <th>Einddatum</th>
                          <th>Naar Detail pagina</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($aAllEvents as $oEvent)
                      <tr>
                          <td>{{$oEvent->name}}</td>
                          <td>{{$oEvent->event_start_date_time}}</td>
                          <td>{{$oEvent->event_end_date_time}}</td>
                          <td>
                              <a href="{{route('event.details.student', $oEvent->id)}}" class="btn btn-info">Details</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <h1>Evenementen die jij aan het organiseren bent:</h1>
            <div>
            <div class="table-responsive">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Evenement</th>
                          <th>Begindatum</th>
                          <th>Einddatum</th>
                          <th>Status</th>
                          <th>Maximale studenten</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($oUser->organisingEvents as $oEvent)
                        @if($oEvent->organiser->id == Auth::user()->id)
                        <tr>
                            <td>{{$oEvent->name}}</td>
                            <td>{{$oEvent->event_start_date_time}}</td>
                            <td>{{$oEvent->event_end_date_time}}</td>
                            <td>{{$oEvent->event_status}}</td>
                            <td>{{$oEvent->max_students}}</td>
                        </tr>
                        @endif
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
        <div class='row justify-content-center'>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Behaalde punten (certificaat/vsr)
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th scope="col">
                                          Type
                                      </th>
                                      <th scope="col">
                                          Aantal behaalde punten
                                      </th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td>
                                          {{ $oUser->studentInfo->points_decision }}
                                      </td>
                                      <td>
                                          {{ $iPoints }}
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="button" class="btn btn-danger m-4">
                <a href="{{ route('profile.terminate')}}">Uitschrijven</a>
            </button>
        </div>
        <div class="col-2"></div>
    </div>
</div>
@endsection
