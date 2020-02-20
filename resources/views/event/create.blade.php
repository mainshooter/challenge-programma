@extends('layout')

@section('content')

<div class="col-12">
  <h1>Event toevoegen</h1>
  <form method="post" class="row">
    @csrf
    <div class="col-6">
      <div class="form-group">
        <label>Naam</label>
        <input type="text" name="event_name" class="form-control">
      </div>
      <div class="form-group">
        <label>Omschrijving</label>
        <textarea name="event_description" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label>Punten</label>
        <input type="number" name="event_points" class="form-control">
      </div>
      <div class="form-group">
        <label>Start datum en tijd</label>
        <input name="event_start_date_time" type="text" readonly class="form-control form_datetime">
      </div>
      <div class="form-group">
        <label>Eind datum en tijd</label>
        <input name="event_end_date_time" type="text" readonly class="form-control form_datetime">
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label>Straat</label>
        <input type="text" name="event_straat" class="form-control">
      </div>
      <div class="form-group">
        <label>Plaats</label>
        <input type="text" name="event_city" class="form-control">
      </div>
      <div class="row">
        <div class="col-12">
          <label>Huisnummer + toevoeging</label>
        </div>
        <div class="col-8">
          <input type="number" name="event_house_number" placeholder="Huisnummer" class="form-control">
        </div>
        <div class="col-4">
          <input type="text" name="event_house_number_addition" placeholder="Toevoegen" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label>Postcode</label>
        <input type="text" name="event_zipcode" class="form-control">
      </div>
    </div>
      <input type="submit" class="btn btn-primary" value="Toevoegen">
  </form>
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
