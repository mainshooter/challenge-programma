@extends('layout')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css')}}">
@endsection
@section('content')

<div class="container">
    @guest
    @elseif($oUser->dutch_role == 'Admin' || $oUser->dutch_role == 'Content writer')
    <a href="{{ route('photoalbum.create')}}" class="btn btn-primary float-right">Nieuwe album toevoegen</a>
    @endif
    <h2 class="row justify-content-center">Tijdlijn</h2>
        <div class="row justify-content-center">
            @foreach ($aPhotoalbum as $album)
            <div class="col-md-8 p-4">
                <div class="card">
                    <div class="card-header">
                        <h4>{{$album->title}} - Bedrijfsnaam, 07-04-2020</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="p-2">{{$album->description}}</h5>
                        <div class="widget-container">
                            <div class="widget row image-tile">
                                @foreach($album->photos as $oPhoto)
                                <div class="tile col-md-5 image-tile-background">
                                    <img src="{{$oPhoto->path}}">
                                    <p>{{$album->description}}</p>
                                </div>
                                @endforeach

                                <div class="tile more-images col-md-2">
                                    <div class="images-number">10+</div>
                                    Foto's
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>

@endsection
