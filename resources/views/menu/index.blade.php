@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        {!! Menu::render() !!}
      </div>
    </div>
  </div>
@endsection

@section('head')
    {!! Menu::scripts() !!}
@endsection
