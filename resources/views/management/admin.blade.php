@extends('layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/management.css') }}">
@endsection

@section('content')
    <div class="container management-menu">
        <div class="row">
          <div class="col">
            <a class="nav-link" href="{{ route('user.index') }}">Gebruikersbeheer</a>
          </div>
          <div class="col">
            <a class="nav-link" href="{{ route('user.not.accepted.overview') }}">Accepteren Gebruikers</a>
          </div>
          <div class="col">
            <a class="nav-link" href="{{ route('event.index') }}"> Evenementenbeheer</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <a class="nav-link" href="{{ route('cms.index') }}">CMS</a>
          </div>
          <div class="col">
            <a class="nav-link" href="{{ route('mail.create') }}">Mail versturen</a>
          </div>
          <div class="col">
            <a class="nav-link" href="{{ route('image.index')  }}">Carousel</a>
          </div>
            <div class="col">
                <a class="nav-link" href="{{ route('photoalbum.create') }}">Photoalbum</a>
            </div>
        </div>
    </div>
@endsection
