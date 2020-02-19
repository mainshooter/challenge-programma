@extends('layout')

@section('content')
@component('component/formError')
@endcomponent
  <a href='{{ route("cms.index") }}'>
    <button type="button" class="btn btn-primary">Terug</button>
  </a>
  <br>
  <form class="form" method="post">
    @csrf
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="page_title" value="{{ $oPage->title }}" class="form-validation form-control" required>
    </div>

    <div class="form-group">
      <label>url slug</label>
      <input type="text" name="url_slug" value="{{ $oPage->slug }}" class="form-validation form-control" required>
    </div>

    <div class="form-group">
      <label>Content</label>
      <div id="editor">
        {!! $oPage->content !!}
      </div>
    </div>

    <input type="hidden" name="page_content">

    <input type="submit" value="Opslaan" class="btn btn-primary">
  </form>
@endsection
@section('head')

  <!-- Main Quill library -->
  <script src="//cdn.quilljs.com/1.3.6/quill.js" defer></script>
  <script src="//cdn.quilljs.com/1.3.6/quill.min.js" defer></script>

  <!-- Theme included stylesheets -->
  <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

  <script src="{{ asset('js/cmsEditor.js') }}" defer></script>
@endsection
