@extends('layout')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/management.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12" align="center">
                <div class="menuDiv" >
                    <nav class="nav flex-column">
                        <a class="nav-link" href="{{ route('user.index') }}">Gebruikersbeheer</a>
                        <a class="nav-link" href="{{ route('user.not.accepted.overview') }}">Accepteren studenten</a>
                        <a class="nav-link" href="{{ route('event.index') }}">Aanmaken evenement</a>
                        <a class="nav-link" href="{{ route('cms.index') }}">CMS</a>
                        <a class="nav-link" href="{{ route('image.index')  }}">Carousel</a>
                    </nav>
                </div>

            </div>
        </div>
    </div>
@endsection
