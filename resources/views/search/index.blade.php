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
                  <h5 class="card-title">{{ $oItem->name }}</h5>
                  <p class="card-text">{{ $oItem->description }}</p>
                </div>
              </div>
            @endforeach
          @endforeach
        </div>
    </div>
  </div>
@endsection
