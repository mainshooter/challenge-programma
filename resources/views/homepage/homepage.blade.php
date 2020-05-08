@extends('layout')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/homepage.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reviewPage.css') }}">
@endsection
@section('content')
    <div class="row">
      @if (count($aImages) > 0)
        <div class="col-md-2"></div>
        <div id="carousel-homepage" class="carousel slide col-md-8" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0; $i < count($aImages); $i++)
                  @if ($i == 0)
                    <li data-target="#carousel-homepage" data-slide-to="{{$i}}" class="active"></li>
                  @else
                    <li data-target="#carousel-homepage" data-slide-to="{{$i}}"></li>
                  @endif
                @endfor
            </ol>
            <div class="carousel-inner" role="listbox">
              @foreach($aImages as $iIndex => $oImage)
                @if ($iIndex == 0)
                  <div class="carousel-item active">
                      <img src="{{Storage::url($oImage->filepath)}}" alt=""/>
                  </div>
                @else
                  <div class="carousel-item">
                      <img src="{{Storage::url($oImage->filepath)}}" alt=""/>
                  </div>
                @endif

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
      @endif
    </div>

    <div class="cards">
        <H3>Wat mensen over ons zeggen: </H3>
        <div class="row">
            @foreach($aReviews as $oReview)
                <div class="col-md-3 col-centered">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$oReview->company->companyInfo->company_name}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $oReview->company->fullname }}</h6>
                            <div class="cardtext">{!! $oReview->body !!}</div>
                            <p class="card-footer">{{$oReview->rating}} / 10</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
