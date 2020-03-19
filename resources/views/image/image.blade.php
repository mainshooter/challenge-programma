@extends('layout')

@section('content')

    <div class="container">
        <div class="jumbotron">
          @component('component/formError')
          @endcomponent
            <form action="{{ route('image.store.post') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                  <label for="filepath">Foto uploaden</label>
                  <input type="file" name="filepath" class="form-control-file" id="filepath">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Opslaan</button>
            </form>
        </div>
    </div>
@endsection
