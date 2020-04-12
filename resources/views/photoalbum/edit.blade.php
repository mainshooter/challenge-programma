@extends('layout')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css')}}">
@endsection

@section('content')
<div class="container">
    <h2 class="row justify-content-center">Album {{ $oPhotoalbum->title}} bewerken</h2>

    <div class="row">
        <div class="col">
            <div class="row justify-content-center p-4">
                <div class="card">
                    <div class="card-header">
                        Foto's toevoegen aan het album
                    </div>
                    <div class="card-body">
                        <form action="{{ route('photoalbum.store.post', $oPhotoalbum->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @if(count($aImages)<1) <label>Uw fotoalbum is leeg, voeg snel foto's toe!</label>
                                @endif
                                <div class="form-group">
                                    <input type="file" name="path" class="form-control-file" id="path" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-md">Opslaan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if(count($aImages)>0)
        <table class="p-4 col table table-hover text-nowrap table-responsive">
            <thead>
                <tr>
                    <th scope="col">Foto's</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aImages as $image)
                <tr>
                    <td>
                        <img class="img-thumbnail rounded mx-auto d-block" src="{{$image->path}}">
                    </td>
                    <td>
                        <a class="btn btn-danger btn-md" href=" {{ route('photoalbum.delete.photo', $image->id)}}">
                            Verwijderen</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

</div>
@endsection