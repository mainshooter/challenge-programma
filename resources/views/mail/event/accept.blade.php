<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>

  </head>

  <body>
    <div>
        Beste {{ $oOrganiser->firstname }},
        <br>
        <br>
        Hierbij ontvangt u een bevestigingsmail dat uw evenement, {{ $oEvent->name }} is goedgekeurd.
        <br><br>
        De gegevens van het evenement, zijn als volgt:
        <ul>
          <li>Aantal punten: {{ $oEvent->points }}</li>
          <li>Start tijd: {{ date('d-M-Y H:i', strtotime($oEvent->event_start_date_time)) }}</li>
          <li>Eind tijd: {{ date('d-M-Y H:i', strtotime($oEvent->event_start_date_time)) }}</li>
        </ul>
        <p>Het adres is<br>
          {{ $oEvent->street }} {{ $oEvent->house_number }}{{ $oEvent->house_number_addition }}
          <br>
          {{ $oEvent->city }} {{ $oEvent->zipcode }}
        </p>
        <br>
        Met vriendelijke groet,
        <br>
        <br>
        Het Challenge programma
    </div>
  </body>
</html>
