@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registreren Student') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.student.post') }}">
                        @csrf

                        {{-- voornaam --}}
                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam *') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                                    name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- tussenvoegsel --}}
                        <div class="form-group row">
                            <label for="prefix" class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>

                            <div class="col-md-6">
                                <input id="prefix" type="text" class="form-control @error('prefix') is-invalid @enderror"
                                    name="prefix" value="{{ old('prefix') }}" autocomplete="prefix" autofocus>

                                @error('prefix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- achternaam --}}
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam *') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- telefoon --}}
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefoonnummer') }}</label>

                            <div class="col-md-3">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- leerjaar --}}
                        <div class="form-group row">
                            <label for="schoolyear" class="col-md-4 col-form-label text-md-right">{{ __('Studiejaar') }}</label>

                            <div class="col-md-2">
                                <input id="schoolyear" type="number" class="form-control @error('schoolyear') is-invalid @enderror"
                                    name="schoolyear" value="1" min="1" max="4" step="1" value="{{ old('schoolyear') }}" required >
                            </div>
                        </div>

                        {{-- certificaat --}}
                        {{-- <div class="form-group row">
                            <label for="cert-checkbox" class="col-md-4 col-form-label text-md-right">{{ __('Certificaat') }}</label>

                            <div class="col-md-2">
                                <input id="cert-checkbox" type="checkbox" class="align-bottom @error('cert-checkbox') is-invalid @enderror"
                                    name="cert-checkbox" value="{{ old('cert-checkbox') }}"  >
                            </div>
                        </div> --}}

                        {{-- email --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password  --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord herhalen *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary">
                                    {{ __('Registreren') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
