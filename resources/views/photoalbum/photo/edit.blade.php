@extends('layout')

@section('content')
  <div class="container justify-content-center">
    <div class="row">
      <div class="col-12">
        <a class="btn btn-primary" href="{{ route('photoalbum.edit', $oImage->photoalbum->id) }}">
          Terug
        </a>
        <h1>Bewerken van foto omschrijving</h1>
        <form class="form editer-form" method="post">
          <div class="form-group">
            <label>Omschrijving bewerken</label>
            <div id="editor">
              {!! $oImage->description !!}
            </div>
            <input type="hidden" name="page_content">
          </div>
          <input type="submit" class="btn btn-primary" value="Opslaan">
        </form>
      </div>
    </div>
  </div>
@endsection

@section('head')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css')}}">
  <!-- Main Quill library -->
  <script src="{{ asset('js/quil.js') }}" defer></script>

  <!-- Theme included stylesheets -->
  <link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('css/quill.bubble.css') }}" rel="stylesheet">

  <script src="{{ asset('js/cmsEditor.js') }}" defer></script>
@endsection
