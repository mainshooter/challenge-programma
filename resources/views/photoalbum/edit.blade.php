@extends('layout')
@section('head')
<script src="{{ asset('js/photoalbum.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    <h2 class="row justify-content-center">Voeg foto's toe aan album {{ $oPhotoalbum->title}}</h2>

    <div class="row justify-content-center p-4">
        <form action="{{ route('photoalbum.store.post', $oPhotoalbum->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="path">Foto uploaden</label>
                <input type="file" name="path" class="form-control-file" id="path" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-md">Opslaan</button>
        </form>
    </div>
    @foreach ($aImages as $image)
    <div class="row justify-content-center">
      <img src="{{$image->path}}">
    </div>
    @endforeach
</div>
@endsection
