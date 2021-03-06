@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('user.index')}}" class="btn btn-primary">Terug</a>
                <div class="card">
                    <div class="card-header">Student Wijzigen</div>
                    <div class="card-body">
                        @component('component/formError')
                        @endcomponent
                        <form method="POST" action="{{ route('user.update.student.post', $oUser->id) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">Voornaam*</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') ? old('firstname') : $oUser->firstname }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prefix" class="col-md-4 col-form-label text-md-right">Tussenvoegsel</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('prefix') is-invalid @enderror" name="middlename" value="{{ old('middlename') ? old('middlename') : $oUser->middlename }}" autocomplete="middlename" autofocus>
                                    @error('middlename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">Achternaam *</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ? old('lastname') : $oUser->lastname }}" required autocomplete="lastname" autofocus>
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Telefoonnummer *</label>
                                <div class="col-md-3">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ? old('phone') : $oUser->phone }}"  autocomplete="phone" autofocus>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="schoolyear" class="col-md-4 col-form-label text-md-right">Studiejaar *</label>

                                <div class="col-md-2">
                                    <input type="number" class="form-control @error('schoolyear') is-invalid @enderror" name="schoolyear" min="1" max="4" step="1" value="{{ old('schoolyear') ? old('schoolyear') : $oUser->studentInfo->school_year }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-mail *</label>

                                <div class="col-md-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') ? old('email') : $oUser->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Rol *</label>

                                <div class="col-md-6">
                                    <div>
                                        <input id="role" type="radio" name="role" value="student" required {{$oUser->role == 'student' ? 'checked' : ''}}>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">Student</label>
                                    </div>
                                    <div>
                                        <input id="role" type="radio" name="role" value="admin" required {{$oUser->role == 'admin' ? 'checked' : ''}}>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">Admin</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" class="btn btn-primary" value="Opslaan">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
