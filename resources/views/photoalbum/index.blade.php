@extends('layout')

@section('content')

<div class="container">
    @guest
    @elseif(Auth::user()->getDutchRoleAttribute() == 'Admin' || Auth::user()->getDutchRoleAttribute() == 'Content writer')
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
                                <div class="tile col-md-5 image-tile-background">
                                    <p>{{$album->description}}</p>
                                </div>
                                <div class="tile col-md-5 image-tile-background">
                                    <p>{{$album->description}}</p>
                                </div>
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