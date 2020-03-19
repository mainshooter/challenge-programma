@extends('layout')

@section('content')
    <div class="container no-max-width">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <label>Weet je zeker dat je wilt uitschrijven!?</label>
                <a href="{{ route('profile.terminate.post', $oUser->id)}}" class="btn btn-danger">Uitschrijven</a>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
@endsection
