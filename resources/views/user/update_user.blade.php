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

                            {{-- Email Address --}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Emailadres') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" name="email" value="{{ $User->email }}" required autocomplete="email">
                                </div>
                            </div>

                            {{-- role --}}
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                                <div class="col-md-6">
                                    <div>
                                        <input id="role" type="radio" name="role" value="student" required {{$User->role == 'student' ? 'checked' : ''}}>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>
                                    </div>
                                    <div>
                                        <input id="role" type="radio" name="role" value="company" required {{$User->role == 'company' ? 'checked' : ''}}>
                                        <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Bedrijf') }}</label>
                                    </div>
                                    <div>
                                        <input id="role" type="radio" name="role" value="admin" required {{$User->role == 'admin' ? 'checked' : ''}}>
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
