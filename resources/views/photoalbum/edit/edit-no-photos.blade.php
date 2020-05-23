@extends('layout')

@section('content')
<div class="container">
    <h2 class="row justify-content-center">Album bewerken</h2>

    <div class="p-4 row justify-content-center">
        <div class="card">
          @component('component/formError')
          @endcomponent
            <div class="card-header">
                Album instellingen
            </div>
            <div class="card-body">
                <form action="{{ route('photoalbum.edit.album', $oPhotoalbum->id) }}" method='post'>
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Album titel</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required
                                autocomplete="name" value="{{$oPhotoalbum->name}}">
                        </div>
                    </div>

                    <div class="form-group row">
        							<label class="col-md-4 col-form-label text-md-right">Evenement</label>
        							<div class="col-md-6">
        								<select class="form-control col-md-12" name="event">
        										<option value="">-------------------------</option>
        									@if ($oPhotoalbum->event)
        										<option value="{{ $oPhotoalbum->event->id }}" selected>{{ $oPhotoalbum->event->name }}</option>
        									@endif
        									@foreach($aEvents as $oEvent)
        											<option value="{{ $oEvent->id }}">{{ $oEvent->name }}</option>
        									@endforeach
        								</select>
        							</div>
        						</div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Beschrijving van evenement *</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="description" required autocomplete="description">{{ old('description') ? old('description') : $oPhotoalbum->description }}</textarea>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Opslaan</button>
                </form>
            </div>
        </div>
        <br>
    </div>

    <div class="p-4 row justify-content-center">
        <div class="card">
            <div class="card-header">
                Foto's toevoegen aan het album
            </div>
            <div class="card-body">
                <form action="{{ route('photoalbum.store.photo', $oPhotoalbum->id) }}" method="post"
                    enctype="multipart/form-data" class="form editer-form">
                    @csrf
                    <label>Uw fotoalbum is leeg, voeg snel foto's toe!</label>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control-file" id="image" required>
                    </div>
                    <div class="form-group">
                        <label>Omschrijving</label>
                        <div id="editor">
                        </div>
                        <input type="hidden" name="page_content">
                    </div>

                    <input type="submit" name="submitPhoto" class="btn btn-primary" value="Opslaan">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/galery.css')}}">
<!-- Main Quill library -->
<script src="{{ asset('js/quil.js') }}" defer></script>

<!-- Theme included stylesheets -->
<link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
<link href="{{ asset('css/quill.bubble.css') }}" rel="stylesheet">

<script src="{{ asset('js/cmsEditor.js') }}" defer></script>
@endsection
