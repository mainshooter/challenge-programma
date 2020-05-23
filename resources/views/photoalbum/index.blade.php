@extends('layout')
@section('head')
<script src="{{ asset('js/photobook.js') }}" defer></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css')}}">
@endsection
@section('content')

<div class="container">
    <div class="float-right">
        @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'content-writer' ))
            <a href="{{ route('photoalbum.create')}}" class="btn btn-primary float-right">Fotoalbum toevoegen</a>
        @endif
        <br>
        <form method="post">
            @csrf
            <label id="selectLabel" class="{{$sSortType}}">Sorteren op:</label>
            <select name="selectSort" class="form-control" id="selectBox">
                <option value="none">
                    Relevantie
                </option>
                <option value="dateNew">
                    Sorteer op nieuwste datum
                </option>
                <option value="dateOld">
                    Sorteer op oudste datum
                </option>
            </select>
        </form>
    </div>
        <br>

    <h2 class="row justify-content-center">Tijdlijn</h2>
    <div class="row justify-content-center">
        @if($aPhotoalbum->isEmpty())
            <h5>Er zijn op het moment geen fotoalbums beschikbaar</h5>
        @endif
        @foreach ($aPhotoalbum as $oAlbum)
        @if($oAlbum->photos->isEmpty())
          @continue
        @endif
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">{{$oAlbum->name}} @if(!is_null($oAlbum->event))- {{$oAlbum->event->name}}, {{$oAlbum->event->event_start_date_time}}@endif </h5>
                </div>
                <div class="card-body">
                    @if(Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'content-writer' ))
                    <a class="btn btn-primary float-right"
                        href="{{route('photoalbum.edit', ['id' => $oAlbum->id])}}">Bewerken</a>
                    @endif
                        <h5 class="p-2">{{$oAlbum->description}}</h5>
                        <div class="widget-container">
                            <div class="widget row image-tile">
                            <div class="row">
                              <div class="col-10 photo-container">
                                @foreach($oAlbum->photos as $oPhoto)
                                    <div class="col-md-12">
                                        <img class="img-thumbnail" src="{{Storage::url($oPhoto->path)}}">
                                    </div>
                                    @break($loop->index == 1)
                                @endforeach
                              </div>
                              <div class="tile more-images col-2">
                                  <a href="{{route('photoalbum.photos', ['id' => $oAlbum->id])}}">
                                    <div class="images-number">{{count($oAlbum->photos)}}</div>
                                    Foto's
                                  </a>
                              </div>
                            </div>
                            </div>
                            <a class="btn btn-primary float-left"
                               href="{{route('photoalbum.photos', ['id' => $oAlbum->id])}}">Foto's bekijken</a>
                        </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
