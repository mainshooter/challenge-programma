@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Fotoboek aanmaken</div>

                    <div class="card-body">
                        @component('component.formError')
                        @endcomponent
                        <form class="form" method="POST" action="{{ route('photoalbum.create.post') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Titel *</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="titel" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                              <label class="col-md-4 col-form-label text-md-right">Evenement</label>
                              <div class="col-md-6">
                                <select class="form-control col-md-12" name="event">
                                    <option value="">-----------</option>
                                  @foreach($aEvents as $oEvent)
                                    <option value="{{ $oEvent->id }}">{{ $oEvent->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Beschrijving van evenement *</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" class="btn btn-primary" value="Aanmaken"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
