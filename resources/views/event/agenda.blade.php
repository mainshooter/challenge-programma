@extends('layout')

@section('content')
  <div class="container no-max-width">
    <div class="row">
      <div class="col-12">
        <h1>Agenda</h1>
        <div id='calendar'></div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="event-modal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="event-modal"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="modal-description"></p>
          <p class="modal-point"></p>
          <p class="modal-address">
          </p>
          <ul>
            <li class="modal-start-time"></li>
            <li class="modal-end-time"></li>
          </ul>
        </div>
        <div class="modal-footer">
          @if(Auth::user() && Auth::user()->role == 'student')
            <button type="button" class="btn btn-primary student-signup">
              <a href="">Inschrijven</a>
            </button>
          @endif
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('head')
  <link href='{{ asset("calendar/core/main.css") }}' rel='stylesheet' />
  <link href='{{ asset("calendar/daygrid/main.css") }}' rel='stylesheet' />
  <link href='{{ asset("calendar/timegrid/main.css") }}' rel='stylesheet' />
  <link href='{{ asset("calendar/list/main.css") }}' rel='stylesheet' />
  <script src='{{ asset("calendar/core/main.js") }}' defer></script>
  <script src='{{ asset("calendar/core/locales-all.js") }}' defer></script>
  <script src='{{ asset("calendar/interaction/main.js") }}' defer></script>
  <script src='{{ asset("calendar/daygrid/main.js") }}' defer></script>
  <script src='{{ asset("calendar/timegrid/main.js") }}' defer></script>
  <script src='{{ asset("calendar/list/main.js") }}' defer></script>
  <script defer>
    document.addEventListener('DOMContentLoaded', () => {
      let calenderElement = document.querySelector('#calendar');
      let calender = new FullCalendar.Calendar(calenderElement, {
        plugins: ['dayGrid'],
        height: 'parent',
        locale: 'nl',
        defaultView: 'dayGridMonth',
        editable: false,
        eventLimit: false,
        businessHours: true,
        events: JSON.parse('{!! $sEvents !!}'),
        eventClick: (event) => {
          let modal = document.querySelector('#event-modal');
          let modalTitle = modal.querySelector('.modal-title');
          let modalDescription = modal.querySelector('.modal-description');
          let modalAdress = modal.querySelector('.modal-address');
          let modalStart = modal.querySelector('.modal-start-time');
          let modalEnd = modal.querySelector('.modal-end-time');
          let modalPoint = modal.querySelector('.modal-point');
          let studentSignup = modal.querySelector('.student-signup a');
          fetch("/agenda/detail/" + event.event.id)
            .then(response => {
              return response.json();
            })
            .then(data => {
              let housenumberAdditionString = data.house_number_addition ? data.house_number_addition : " ";
              modalTitle.innerText = data.name;
              modalDescription.innerText = data.description;
              modalAdress.innerText = data.street + " " + data.house_number + housenumberAdditionString + "\n " + data.city + " " + data.zipcode;
              modalStart.innerText = "Start: " + new Date(data.event_start_date_time).toLocaleDateString() + " " + data.event_start_date_time.split(" ")[1];
              modalEnd.innerText = "Eind: " + new Date(data.event_end_date_time).toLocaleDateString() + " " + data.event_end_date_time.split(" ")[1];
              modalPoint.innerText = "Punt: " + data.points;
              studentSignup.href = "/student/event/register/" + data.id;
            });
          $('#event-modal').modal('show');
        }
      });
      calender.render();
    });

  </script>
@endsection
