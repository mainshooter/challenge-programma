@extends('layout')

@section('content')
<div class="container">
    <h2 class="row justify-content-center">Album bewerken</h2>

    <div class="row justify-content-center">
      <div class="p-4">
        <div class="card">
            <div class="card-header">
                Foto's toevoegen aan het album
            </div>
            <div class="card-body">
                <form action="{{ route('photoalbum.store.post', $oPhotoalbum->id) }}" method="post" enctype="multipart/form-data" class="form editer-form">
                    @csrf
                      <label>Uw fotoalbum is leeg, voeg snel foto's toe!</label>
                      <div class="form-group">
                          <input type="file" name="path" class="form-control-file" id="path" required>
                      </div>
                      <div class="form-group">
                        <label>Omschrijving</label>
                        <div id="editor">
                        </div>
                        <input type="hidden" name="page_content">
                      </div>

                      <button type="submit" name="submit" class="btn btn-primary btn-md">Opslaan</button>
                </form>
            </div>
        </div>
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
