@extends('layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reviewPage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="content">
                <div class="rating">
                    <p class="ratingtext">Het gemiddelde cijfer van het Challenge programma:</p>
                    @for($i = 0; $i < $avgRating; $i++)
                        <span class="fa fa-star checked"></span>
                    @endfor
                    @for($i = 0; $i < 10 - $avgRating; $i++)
                        <span class="fa fa-star"></span>
                    @endfor
                    <H2>Wat bedrijven denken over het Challenge programma:</H2>
                    <div class="row">
                        @for($i = 0; $i < 5; $i++)
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Title</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Reviewer</h6>
                                        <p class="card-text body-text">dgdds dasgsdgag sdag sadg sadg sadg dsa gsdagdsasdaggsdagsda  sgdasdgagsdag asgd sadgd sa sadgsadsad sdaas gdsdg aas gsa gd gsag sadagsdgdsadg ga s gsd asgdgsda sda g        asdgasdgasdgdasdgsadgasd a</p>
                                        <p class="card-text">Rating / 10</p>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
