@extends('layout')

@section('content')

    <div class="container">
        <form method="post" enctype="multipart/form-data" action="{{ route('image.store.post') }}">
          @csrf
          <div class="form-group">
            <label>Foto</label>
            <input type="file" name="photo" class="form-control">
          </div>
          <input type="submit" class="btn btn-primary">
      </form>
    </div>
@endsection
