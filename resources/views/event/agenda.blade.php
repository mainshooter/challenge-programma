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
          <div class="event-photoalbum-container">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="create-event-modal" tabindex="-1" role="dialog" aria-labelledby="event-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Evenement toevoegen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form row">
            @csrf
            <div class="alert alert-danger display-none col-12">
              <ul>
              </ul>
            </div>
            <div class="alert alert-info display-none col-12"></div>
            <div class="col-6">
              <div class="form-group">
                <label>Naam *</label>
                <input type="text" name="event_name" class="form-control" value="{{ old('event_name') }}" required>
              </div>
              <div class="form-group">
                <label>Omschrijving *</label>
                <textarea name="event_description" class="form-control" required>{{ old('event_description') }}</textarea>
              </div>
              <div class="form-group">
                <label>Punten *</label>
                <input type="number" name="event_points" class="form-control" value="{{ old('event_points') }}" required>
              </div>
              <div class="form-group">
                <label>Maximaal aantal studenten</label>
                <input type="number" name="event_max_students" class="form-control" value="{{ old('event_max_students') }}">
              </div>
              <div class="form-group">
                <label>Start datum en tijd *</label>
                <input name="event_start_date_time" type="text" readonly class="form-control form_datetime" value="{{ old('event_start_date_time') }}" required>
              </div>
              <div class="form-group">
                <label>Eind datum en tijd *</label>
                <input name="event_end_date_time" type="text" readonly class="form-control form_datetime" value="{{ old('event_end_date_time') }}" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label>Straat *</label>
                <input type="text" name="event_straat" class="form-control" value="{{ old('event_straat') }}" required>
              </div>
              <div class="form-group">
                <label>Plaats *</label>
                <input type="text" name="event_city" class="form-control" value="{{ old('event_city') }}" required>
              </div>
              <div class="row">
                <div class="col-12">
                  <label>Huisnummer* + toevoeging</label>
                </div>
                <div class="col-8">
                  <input type="number" name="event_house_number" placeholder="Huisnummer" class="form-control" value="{{ old('event_house_number') }}" required>
                </div>
                <div class="col-4">
                  <input type="text" name="event_house_number_addition" placeholder="Toevoegen" class="form-control" value="{{ old('event_house_number_addition') }}">
                </div>
              </div>
              <div class="form-group">
                <label>Postcode *</label>
                <input type="text" name="event_zipcode" class="form-control" placeholder="1234CR" value="{{ old('event_zipcode') }}" required>
              </div>
            </div>
            <div class="col-4">
              <input type="submit" class="btn btn-primary" value="Indienen">
            </div>
          </form>
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
  <script src="{{ asset('js/AgendaCreateEvent.js') }}" defer></script>
  <script src='{{ asset("calendar/core/main.js") }}' defer></script>
  <script src='{{ asset("calendar/core/locales-all.js") }}' defer></script>
  <script src='{{ asset("calendar/interaction/main.js") }}' defer></script>
  <script src='{{ asset("calendar/daygrid/main.js") }}' defer></script>
  <script src='{{ asset("calendar/timegrid/main.js") }}' defer></script>
  <script src='{{ asset("calendar/list/main.js") }}' defer></script>
  <link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
  <script src="{{ asset('js/datetimepicker.js') }}" defer></script>
  <script defer>
    document.addEventListener('DOMContentLoaded', () => {
      let calenderElement = document.querySelector('#calendar');
      let calender = new FullCalendar.Calendar(calenderElement, {
        plugins: ['dayGrid', 'interaction'],
        height: 'parent',
        locale: 'nl',
        defaultView: 'dayGridMonth',
        editable: false,
        eventLimit: false,
        businessHours: false,
        events: JSON.parse('{!! $sEvents !!}'),
        @if(Auth::user())
          dateClick: (date, jsEvent, view) => {
            let createEventModal = document.querySelector("#create-event-modal");
            let form = createEventModal.querySelector('form');
            form.reset();
            let clickedDate = date.dateStr;
            clickedDate = clickedDate.replace("-", "/");
            clickedDate = clickedDate.replace("-", "/");
            createEventModal.querySelector("input[name=event_start_date_time]").value = clickedDate;
            createEventModal.querySelector("input[name=event_end_date_time]").value = clickedDate;
            $('#create-event-modal').modal('show');
            jQuery('.form_datetime').datetimepicker('nl');
            $('.form_datetime').datetimepicker();
            createEventModal.querySelector("input[type=submit]").addEventListener('click', (event) => {
              event.preventDefault();
              let agendaCreateEvent = new AgendaCreateEvent(form, "{{ route('event.create.ajax.post') }}", createEventModal);
              agendaCreateEvent.validate();
            });
          },
        @endif
        eventClick: (event) => {
          let modal = document.querySelector('#event-modal');
          let modalTitle = modal.querySelector('.modal-title');
          let modalDescription = modal.querySelector('.modal-description');
          let modalAdress = modal.querySelector('.modal-address');
          let modalStart = modal.querySelector('.modal-start-time');
          let modalEnd = modal.querySelector('.modal-end-time');
          let modalPoint = modal.querySelector('.modal-point');
          let studentSignup = modal.querySelector('.student-signup a');
          let photoalbumContainer = modal.querySelector('.event-photoalbum-container');
          fetch("/agenda/detail/" + event.event.id)
            .then(response => {
              return response.json();
            })
            .then(data => {
              photoalbumContainer.innerHtml = "";
              let housenumberAdditionString = data.house_number_addition ? data.house_number_addition : " ";
              modalTitle.innerText = data.name;
              modalDescription.innerText = data.description;
              modalAdress.innerText = data.street + " " + data.house_number + housenumberAdditionString + "\n " + data.city + " " + data.zipcode;
              modalStart.innerText = "Start: " + new Date(data.event_start_date_time).toLocaleDateString() + " " + data.event_start_date_time.split(" ")[1];
              modalEnd.innerText = "Eind: " + new Date(data.event_end_date_time).toLocaleDateString() + " " + data.event_end_date_time.split(" ")[1];
              modalPoint.innerText = "Punt: " + data.points;
                if (data.photoalbum_id) {
                    if(document.getElementById("link")) {
                        document.getElementById("link").remove();
                    }
                        let link = document.createElement('a');
                        link.id = "link";
                        link.setAttribute("href", '/photos/' + data.photoalbum_id);
                        link.classList.add('btn', 'btn-info');
                        link.innerText = "Fotoalbum bekijken";
                        photoalbumContainer.appendChild(link);

                }
              try {
                studentSignup.href = "/student/event/register/" + data.id;
              } catch (e) {}
            });
          $('#event-modal').modal('show');
        }
      });
      calender.render();
      Echo.channel('event').listen('NewAgendaEvent', function(e) {
        console.log(e);
        calender.addEvent(e.event);
      });
    });
  </script>
@endsection
