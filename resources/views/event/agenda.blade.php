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
          <h5 class="modal-title" id="event-modal">Evenement naam</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="modal-description">Omschrijving</p>
          <p class="modal-address">
            <strong>Example Inc.</strong><br>
            214 Onderwijsboulevard<br>
            Den Bosch, 4585CX<br>
          </p>
          <ul>
            <li class="modal-start-time">Begin tijd: 2020-03-02 19:53:00</li>
            <li class="modal-end-time">Eind tijd: 2020-03-02 19:53:00</li>
          </ul>
        </div>
        <div class="modal-footer">
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
        weekNumbers: true,
        defaultView: 'dayGridMonth',
        editable: false,
        eventLimit: false,
        events: JSON.parse('{!! $sEvents !!}'),
        eventClick: (event) => {
          let modal = document.querySelector('#event-modal');
          let modalTitle = modal.querySelector('.modal-title');
          let modalDescription = modal.querySelector('.model-description');
          let modalAdress = modal.querySelector('.model-address');
          let modalStart = modal.querySelector('.modal-start-time');
          let modalEnd = modal.querySelector('.modal-end-time');
          $('#event-modal').modal('show');
        }
      });
      calender.render();
    });

  </script>
@endsection
