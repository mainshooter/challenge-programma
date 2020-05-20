@extends('layout')

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/profilePage.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="container no-max-width">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Volgende Evenementen:</h1>
            <div class="responsive-table">
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
                      @foreach($oUser->events as $oEvent)
                      <tr>
                          <td>{{$oEvent->name}}</td>
                          <td>{{$oEvent->event_start_date_time}}</td>
                          <td>{{$oEvent->event_end_date_time}}</td>
                          <td>
                              <a href="{{route('event.details', $oEvent->id)}}" class="btn btn-info">Details</a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <h1>Evenementen die jij aan het organiseren bent:</h1>
            <div>
            <div class="responsive-table">
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
        <div class="col-2"></div>
    </div>
    <div class='row justify-content-center'>
        <div class="col-md-4 ">
            <div class="card m-4">
                <div class="card-header">
                    Behaalde punten (certificaat/vsr)
                </div>
                <div class="card-body">
                    <div class="responsive-table">
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
</div>
@endsection
