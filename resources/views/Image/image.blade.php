@extends('layout')

@section('content')

    <div class="container">
        <div class="jumbotron">
            <form action="{{ route('image.store.post') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="filepath" class="custom-file-input">
                        <label class="custom-file-label">Kies je Foto</label>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Opslaan</button>
            </form>
        </div>
    </div>
@endsection
