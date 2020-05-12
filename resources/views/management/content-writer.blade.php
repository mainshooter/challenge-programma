@extends('layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/management.css') }}">
@endsection

@section('content')
    <div class="container management-menu">
        <div class="row">
          <div class="col">
            <a class="nav-link" href="{{ route('cms.index') }}">CMS</a>
          </div>
          <div class="col">
              <a class="nav-link" href="{{ route('photoalbum.overview') }}">Fotoalbum</a>
          </div>
          <div class="col">
              <a class="nav-link" href="{{ route('menu.index') }}">Menu</a>
          </div>
        </div>
    </div>
@endsection
