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
                        <a class="nav-link" href="admin/user">Gebruikersbeheer</a>
                        <a class="nav-link" href="admin/new-student">Accepteren studenten</a>
                        <a class="nav-link" href="admin/event">Aanmaken evenement</a>
                        <a class="nav-link" href="admin/cms">CMS</a>
                    </nav>
                </div>

            </div>
        </div>
    </div>
@endsection
