@extends('layout')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css') }}">
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        @foreach ($oPhotoalbum as $album)
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-header">
                    <h4>{{$album->title}} - Bedrijfsnaam, 07-04-2020</h4>
                </div>
                <div class="card-body">
                    <h5 class="p-2">{{$album->description}}</h5>
                    <div class="widget-container">
                        <div class="widget row image-tile">
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/300') no-repeat center top; background-size: cover;">
                                <p>{{$album->description}}</p>
                            </div>
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/400') no-repeat center top; background-size: cover;">
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