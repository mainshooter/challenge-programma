@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="{{route('user.index')}}" class="btn btn-primary">Terug</a>
                <div class="card">
                    <div class="card-header">Bedrijf Wijzigen</div>
                    <div class="card-body">
                        @component('component/formError')
                        @endcomponent
                        <form method="POST" action="{{ route('user.update.company.post', $oUser->id) }}">
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
                                <label for="company_name" class="col-md-4 col-form-label text-md-right">Bedrijfsnaam *</label>

                                <div class="col-md-6">
                                    <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror"
                                        name="company_name" value="{{ old('company_name') ? old('company_name') : $oUser->companyInfo->company_name }}" required autocomplete="company_name" autofocus>

                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street" class="col-md-4 col-form-label text-md-right">Straatnaam *</label>

                                <div class="col-md-6">
                                    <input id="street" name="street" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('street') ? old('street') : $oUser->companyInfo->street }}" required autocomplete="street" autofocus>

                                    @error('street')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="house_number" class="col-md-4 col-form-label text-md-right">Huisnummer *</label>

                                <div class="col-md-6">
                                    <input id="house_number" name="house_number" type="text" class="form-control @error('house_number') is-invalid @enderror" value="{{ old('house_number') ? old('house_number') : $oUser->companyInfo->house_number }}" required autocomplete="house_number" autofocus>

                                    @error('house_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="house_number_addition" class="col-md-4 col-form-label text-md-right">Huisnummer toevoeging</label>

                                <div class="col-md-6">
                                    <input id="house_number_addition" name="house_number_addition" type="text" class="form-control @error('house_number_addition') is-invalid @enderror" value="{{ old('house_number_addition') ? old('house_number_addition') : $oUser->companyInfo->house_number_addition }}" autocomplete="house_number_addition" autofocus>

                                    @error('house_number_addition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">Plaats *</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="city" value="{{ old('city') ? old('city') : $oUser->companyInfo->city }}" required autocomplete="city" autofocus>

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">Postcode *</label>

                                <div class="col-md-6">
                                    <input id="zipcode" type="text" class="form-control @error('postal_code') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') ? old('zipcode') : $oUser->companyInfo->zipcode }}" required autocomplete="zipcode" autofocus>

                                    @error('zipcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                        <input id="role" type="radio" name="role" value="company" required {{$oUser->role == 'company' ? 'checked' : ''}}>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">Bedrijf</label>
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
