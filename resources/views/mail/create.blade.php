@extends('layout')

@section('content')
  <div class="container">
    <button type="button" class="btn btn-primary">
      <a href="{{ route('management.index') }}">Terug</a>
    </button>
    <div class="row">
      <div class="col-12">
        <form method="post" class="editer-form">
          <div class="form-group">
            <label>Onderwerp *</label>
            <input type="text" name="mail_subject" class="form-control">
          </div>
          <div class="form-group">
            <label>Tekst *</label>
            <div id="editor"></div>
            <input type="hidden" name="page_content">
          </div>

          <input type="submit" name="" value="Mail verzenden" class="btn btn-primary">
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
