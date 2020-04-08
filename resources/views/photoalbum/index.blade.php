@extends('layout')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css') }}">
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-header">
                    <h4>Evenementnaam</h4>
                </div>
                <div class="card-body">
                    <h5 class="p-2">Bedrijfsnaam, 07-04-2020</h5>
                    <div class="widget-container">
                        <div class="widget row image-tile">
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/300') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/400') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/500') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/600') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile more-images col-md-2">
                                <div class="images-number">42+</div>
                                Foto's
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-header">
                    <h4>Evenementnaam</h4>
                </div>
                <div class="card-body">
                    <h5 class="p-2">Bedrijfsnaam, 07-04-2020</h5>
                    <div class="widget-container">
                        <div class="widget row image-tile">
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/300') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/400') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/500') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile col-md-5"
                                style="background: url('https://picsum.photos/600') no-repeat center top; background-size: cover;">
                                <p>Kleine beschrijving toegevoegd door Admin</p>
                            </div>
                            <div class="tile more-images col-md-2">
                                <div class="images-number">42+</div>
                                Foto's
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection