@extends('layout')

@section('content')
<div class="container">
    <h2 class="row justify-content-center">Voeg foto's toe aan album {{ $oPhotoalbum->title}}</h2>
    <button type="button" class="btn btn-primary">
      <a href="{{ route('photoalbum.overview') }}">Terug</a>
    </button>
    <div class="row justify-content-center p-4">
        <form action="{{ route('photoalbum.store.post', $oPhotoalbum->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="path">Foto uploaden</label>
                <input type="file" name="path" class="form-control-file" id="path">
            </div>
            <div class="form-group">
              <label>Omschrijving</label>
              <div id="editor"></div>
              <input type="hidden" name="page_content">
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-md">Opslaan</button>
        </form>
    </div>

    {{-- todo fotos laten zien uit dit albumpie --}}
    <div class="row justify-content-center">

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
