@extends('layout')

@section('content')
  <div class="container no-max-width">
    <div class="row">
      <div class="col-12">
        <div id='calendar'></div>
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
        locale: 'nl',
        weekNumbers: true,
        editable: false,
        eventLimit: false,
        events: [
          {
            title: 'My event',
            start: '2020-03-03T12:00',
            end: '2020-03-03T15:00',
          }
        ]
      });
      calender.render();
    });

  </script>
@endsection
