@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Wijzigen</div>
                    <div class="card-body">
                        @component('component/formError')
                        @endcomponent
                        <form method="POST" action="{{ route('user.update.admin.post', $oUser->id) }}">
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
                                    <input type="text" class="form-control @error('middlename') is-invalid @enderror" name="middlename" value="{{ old('middlename') ? old('middlename') : $oUser->middlename }}" autocomplete="middlename" autofocus>
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
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email *</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="{{ old('') ? old() : $oUser->email }}" class="form-control" required autocomplete="email">
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
