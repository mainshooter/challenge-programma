@extends('layout')

@section('head')
<script src="{{ asset('js/review.js') }}" defer></script>

<link rel="stylesheet" type="text/css" href="{{ asset('css/reviewPage.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-12">
            <div class="rating">

                <H2>
                    Wat bedrijven denken over het Challenge programma
                </H2>
                <div class="float-right" >
                    <label >Sorteren op:</label>
                    <select class="form-control" id="selectedBox"  onchange="location = this.value;">
                        <option value="{{ route('reviews.index') }}">
                            Relevantie
                        </option>
                        <option value="{{ route('reviews.hoog') }}">
                            Review hoog - laag
                        </option>
                        <option value="{{ route('reviews.laag') }}">
                            Review laag - hoog
                        </option>
                    </select>
                </div>

                <div class="row">
                    @foreach($aReviews as $review)
                    <div class="col-md-6 col-sm-12">
                        <div class="card mx-auto">
                            <div class="card-body">
                                <h5 class="card-title">{{$review->name_company}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{$review->name_reviewer}}</h6>
                                <p class="card-text body-text">{{$review->body}}</p>
                                <p class="card-text">{{$review->rating}} / 10</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <br>
                <p class="ratingtext">Het gemiddelde cijfer van het Challenge programma</p>
                @for($i = 0; $i < $avgRating; $i++) <span class="fa fa-star checked"></span>
                    @endfor
                    @for($i = 0; $i < 10 - $avgRating; $i++) <span class="fa fa-star"></span>
                        @endfor
                        <p>{{$avgRating}} / 10</p>
                        <br>
                        @if (Auth::user() && Auth::user()->role == 'company')
                        <a href="#" class="btn btn-primary">Review toevoegen</a>
                        @endif
            </div>
        </div>
    </div>
</div>


@endsection