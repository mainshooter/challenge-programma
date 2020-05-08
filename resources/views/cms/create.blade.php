@extends('layout')

@section('content')
@component('component/formError')
@endcomponent

<div class="container no-max-width">
  <div class="row">
    <div class="col-2"></div>
    <div class="col-8">
      <a href='{{ route("cms.index") }}'>
        <button type="button" class="btn btn-primary">Terug</button>
      </a>

      <form class="form editer-form" method="post">
        @csrf
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="page_title" value="{{ old('page_title') }}" class="form-validation form-control" required>
        </div>

        <div class="form-group">
          <label>url slug</label>
          <input type="text" name="url_slug" value="{{ old('page_title') }}" class="form-validation form-control" required>
        </div>

        <div class="form-group">
          <label>Content</label>
          <div id="editor">
            {{ old('page_content') }}
          </div>
        </div>

        <input type="hidden" name="page_content">

        <input type="submit" name="" value="Opslaan" class="btn btn-primary">
      </form>
    </div>
    <div class="col-2"></div>
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
