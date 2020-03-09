@extends('layout')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}" >

@endsection
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div id="carousel-homepage" class="carousel slide col-md-8" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-homepage" data-slide-to="0" class="active"></li>
                @for($i = 1; $i < count($aImages) + 1; $i++)
                  <li data-target="#carousel-homepage" data-slide-to="{{$i}}"></li>
                @endfor
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{Storage::url($oStartImage->filepath)}}" alt="First Slide">
                </div>
                @foreach($aImages as $image)
                    <div class="carousel-item">
                        <img src="{{Storage::url($image->filepath)}}" alt=""/>
                    </div>
                    @endforeach
            </div>

            <a class="carousel-control-prev" href="#carousel-homepage" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-homepage" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="col-md-2"></div>
    </div>

    <div class="cards">
        <H3>Wat mensen over ons zeggen: </H3>
        <div class="row">
            @if(count($reviews) > 2)
                <div class="col-md-2"> </div>
            @endif
            @if(count($reviews) < 3)
                <div class="col-md-5"></div>
                @endif
                @foreach($reviews as $review)
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$review->name_company}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{$review->name_reviewer}}</h6>
                            <p class="card-text">{{$review->body}}</p>
                            <p class="card-footer">{{$review->rating}} / 10</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-md-2"></div>
        </div>
    </div>
    <a href='/image'>
        <button type="button" class="btn btn-primary">addimage</button>
    </a>
@endsection
