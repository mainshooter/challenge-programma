@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registreren') }}</div>

                <div class="card-body">
                    <form>
                        @csrf

                        {{-- student/company --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Registreren als') }}</label>

                            <div class="col-md-6">
                                <a class="btn btn-link" href="{{route('register_students')}}" >{{ __('Studenten') }}</a>
                                <a class="btn btn-link" href="{{route('register_students')}}" >{{ __('Bedrijven') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
