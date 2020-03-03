@extends('layout')

@section('content')
  <div class="container no-max-width">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <h1>{{$title}}</h1>
        <p>
          {!! $content !!}
        </p>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
@endsection
