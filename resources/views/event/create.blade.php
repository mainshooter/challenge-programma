@extends('layout')

@section('content')
<div class="container no-max-width">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      @component('component/formError')
      @endcomponent

      <a href="{{ route('event.index') }}" class="btn btn-primary">Terug</a>

      <h1>Event toevoegen</h1>
      <form method="post" class="row">
        @csrf
        <div class="col-6">
          <div class="form-group">
            <label>Naam</label>
            <input type="text" name="event_name" class="form-control" value="{{ old('event_name') }}">
          </div>
          <div class="form-group">
            <label>Omschrijving</label>
            <textarea name="event_description" class="form-control">{{ old('event_description') }}</textarea>
          </div>
          <div class="form-group">
            <label>Punten</label>
            <input type="number" name="event_points" class="form-control" value="{{ old('event_points') }}">
          </div>
          <div class="form-group">
            <label>Start datum en tijd</label>
            <input name="event_start_date_time" type="text" readonly class="form-control form_datetime" value="{{ old('event_start_date_time') }}">
          </div>
          <div class="form-group">
            <label>Eind datum en tijd</label>
            <input name="event_end_date_time" type="text" readonly class="form-control form_datetime" value="{{ old('event_end_date_time') }}">
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label>Straat</label>
            <input type="text" name="event_straat" class="form-control" value="{{ old('event_straat') }}">
          </div>
          <div class="form-group">
            <label>Plaats</label>
            <input type="text" name="event_city" class="form-control" value="{{ old('event_city') }}">
          </div>
          <div class="row">
            <div class="col-12">
              <label>Huisnummer + toevoeging</label>
            </div>
            <div class="col-8">
              <input type="number" name="event_house_number" placeholder="Huisnummer" class="form-control" value="{{ old('event_house_number') }}">
            </div>
            <div class="col-4">
              <input type="text" name="event_house_number_addition" placeholder="Toevoegen" class="form-control" value="{{ old('event_house_number_addition') }}">
            </div>
          </div>
          <div class="form-group">
            <label>Postcode</label>
            <input type="text" name="event_zipcode" class="form-control" placeholder="1234CR" value="{{ old('event_zipcode') }}">
          </div>
        </div>
          <input type="submit" class="btn btn-primary" value="Toevoegen">
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
