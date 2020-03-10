@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Gebruiker Wijzigen') }}</div>
                    <div class="card-body">
                        @component('component/formError')
                        @endcomponent
                        <form method="POST" action="{{ route('user.edit.post', $User->id) }}">
                            {{csrf_field()}}


                            {{-- voornaam --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control"
                                           name="name" value="{{ $User->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            {{-- tussenvoegsel --}}
                            <!--
                            <div class="form-group row">
                                <label for="infixname" class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>

                                <div class="col-md-6">
                                    <input id="infixname" type="text" class="form-control"
                                           name="infixname" value="{{ old('infixname') }}" required autocomplete="infixname" autofocus>

                                </div>
                            </div>
                            -->

                            {{-- achternaam --}}
                            <!--
                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control"
                                           name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                </div>
                            </div>
                            -->

                            {{-- leerjaar --}}
                            <div class="form-group row">
                                <label for="schoolyear" class="col-md-4 col-form-label text-md-right">{{ __('Studiejaar') }}</label>

                                <div class="col-md-2">
                                    <input id="schoolyear" type="number" class="form-control @error('schoolyear') is-invalid @enderror"
                                           name="schoolyear" value="1" min="1" max="4" step="1" value="{{ old('schoolyear') }}" required >

                                    @error('schoolyear')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Emailadres') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="{{ $User->email }}" required autocomplete="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                                <div class="col-md-6">
                                    <div>
                                        <input id="role" type="radio" name="role" value="student" required checked>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>
                                    </div>
                                    <div>
                                        <input id="role" type="radio" name="role" value="company" required>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Bedrijf') }}</label>
                                    </div>
                                    <div>
                                        <input id="role" type="radio" name="role" value="admin" required>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Opslaan') }}
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
