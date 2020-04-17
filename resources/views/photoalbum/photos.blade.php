@extends('layout')

@section('content')
    <div class="container justify-content-center">
        <h1>Foto's van Album</h1>
        @foreach ($oAlbum->photos as $oPhoto)
            <div class="col-md-12">
                <div class="card">
                    <img class="img-thumbnail rounded mx-auto d-block" src="{{Storage::url($oPhoto->path)}}">
                    @if(!empty($oPhoto))
                        {!! $oPhoto->description !!}
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
