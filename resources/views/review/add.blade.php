@extends('layout')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12">
      <form method="post" class="form editer-form">
        @csrf
        @component('component.formError')
        @endcomponent
        <h1>Review achterlaten</h1>
        <div class="form-group">
          <label>Geef een cijfer*</label>
          <input type="number" name="review_stars" class="form-control" min="1" max="10" step="0.5" value="{{ old('review_stars') ? old('review_stars') : '' }}">
        </div>
        <div class="form-group">
          <label>Uw review*</label>
          <div id="editor">
          </div>
        </div>
        <input type="hidden" name="page_content"/>
        <input type="submit" value="Toevoegen" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
@endsection

@section('head')

  <!-- Main Quill library -->
  <script src="{{ asset('js/quil.js') }}" defer></script>

  <!-- Theme included stylesheets -->
  <link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('css/quill.bubble.css') }}" rel="stylesheet">

  <script src="{{ asset('js/cmsEditor.js') }}" defer></script>
@endsection
