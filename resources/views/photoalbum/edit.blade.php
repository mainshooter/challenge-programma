@extends('layout')

@section('content')
<div class="container">
    <h2 class="row justify-content-center">Voeg foto's toe aan album {{ $oPhotoalbum->title}}</h2>

    <div class="row justify-content-center p-4">
        <form action="{{ route('photoalbum.store.post', $oPhotoalbum->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="filepath">Foto uploaden</label>
                <input type="file" name="filepath" class="form-control-file" id="filepath">
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-md">Opslaan</button>
        </form>
    </div>

    {{-- todo fotos laten zien uit dit albumpie --}}
    <div class="row justify-content-center">
        
    </div>

</div>
@endsection