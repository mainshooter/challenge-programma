@extends('layout')

@section('content')
<div class="container no-max-width">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      @component('component/formError')
      @endcomponent

      <a href="{{ route('event.index') }}" class="btn btn-primary">Terug</a>

      <h1>Evenement bewerken</h1>
      <form method="post" class="row">
        @csrf
        <div class="col-6">
          <div class="form-group">
            <label>Naam *</label>
            <input type="text" name="event_name" class="form-control" value="{{ old('event_name') ? old('event_name') : $oEvent->name }}" required>
          </div>
          <div class="form-group">
            <label>Omschrijving *</label>
            <textarea name="event_description" class="form-control" required>{{ old('event_description') ? old('event_description') : $oEvent->description }}</textarea>
          </div>
          <div class="form-group">
            <label>Punten *</label>
            <input type="number" name="event_points" class="form-control" value="{{ old('event_points') ? old('event_points') : $oEvent->points }}" required>
          </div>
          <div class="form-group">
            <label>Maximaal aantal studenten</label>
            <input type="number" name="event_max_students" class="form-control" value="{{ old('event_max_students') ? old('event_max_students') : $oEvent->max_students }}">
          </div>
          <div class="form-group">
            <label>Start datum en tijd *</label>
            <input name="event_start_date_time" type="text" readonly class="form-control form_datetime" value="{{ old('event_start_date_time') ? old('event_start_date_time') : $oEvent->event_start_date_time }}" required>
          </div>
          <div class="form-group">
            <label>Eind datum en tijd *</label>
            <input name="event_end_date_time" type="text" readonly class="form-control form_datetime" value="{{ old('event_end_date_time') ? old('event_end_date_time') : $oEvent->event_end_date_time }}" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Straat *</label>
            <input type="text" name="event_straat" class="form-control" value="{{ old('event_straat') ? old('event_straat') : $oEvent->street }}" required>
          </div>
          <div class="form-group">
            <label>Plaats *</label>
            <input type="text" name="event_city" class="form-control" value="{{ old('event_city') ? old('event_city') : $oEvent->city }}" required>
          </div>
          <div class="row">
            <div class="col-12">
              <label>Huisnummer * + toevoeging</label>
            </div>
            <div class="col-8">
              <input type="number" name="event_house_number" placeholder="Huisnummer" class="form-control" value="{{ old('event_house_number') ? old('event_house_number') : $oEvent->house_number }}" required>
            </div>
            <div class="col-4">
              <input type="text" name="event_house_number_addition" placeholder="Toevoegen" class="form-control" value="{{ old('event_house_number_addition') ? old('event_house_number_addition') : $oEvent->house_number_addition }}">
            </div>
          </div>
          <div class="form-group">
            <label>Postcode *</label>
            <input type="text" name="event_zipcode" class="form-control" placeholder="1234CR" value="{{ old('event_zipcode') ? old('event_zipcode') : $oEvent->zipcode }}" required>
          </div>
        </div>
          <input type="submit" class="btn btn-primary" value="Opslaan">
      </form>
    </div>
    <div class="col-2"></div>
  </div>
</div>

@endsection
@section('head')
<link rel="stylesheet" href="{{ asset('css/datetimepicker.css') }}">
<script src="{{ asset('js/datetimepicker.js') }}" defer></script>
<script defer>
  $(document).ready(() => {
    jQuery('.form_datetime').datetimepicker('nl');
    $('.form_datetime').datetimepicker();
  });

</script>
@endsection
