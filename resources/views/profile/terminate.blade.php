@extends('layout')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h1>Weet je zeker dat je wilt uitschrijven?</h1>
                <button type="button" class="btn btn-danger">
                  <a href="{{ route('profile.terminate.post', $oUser->id)}}">Uitschrijven</a>
                </button>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
