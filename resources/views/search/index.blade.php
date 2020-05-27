@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Zoek resultaten van: {{ $sSearch }}</h1>
        <div class="search-results">
          @foreach($aResults as $sKey => $aItemResults)
            @foreach($aItemResults as $oItem)
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">
                    @if($sKey == 'event' && Auth::user() && Auth::user()->role == 'student')
                      <a href="{{ route('event.register.student', $oItem->id) }}">{{ $oItem->name }}</a>
                    @elseif($sKey == 'event')
                      <a href="{{ route('event.details.guest', $oItem->id) }}">{{ $oItem->name }}</a>
                    @elseif($sKey == 'photoalbum')
                      <a href="{{ route('photoalbum.photos', $oItem->id) }}">{{ $oItem->name }}</a>
                    @else
                      {{ $oItem->name }}
                    @endif
                  </h5>
                  <p class="card-text">{{ $oItem->description }}</p>
                </div>
              </div>
            @endforeach
          @endforeach
            </div>
        </div>
    </div>
  </div>
@endsection
