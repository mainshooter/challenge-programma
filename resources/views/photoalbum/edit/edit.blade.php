@extends('layout')

@section('content')
<div class="container">
	<h2 class="row justify-content-center">Album {{$oPhotoalbum->name}} bewerken</h2>
	<div class="row p-4">
		<div class="col-5">
			<div class="card">
				<div class="card-header">
					Album instellingen
				</div>
				<div class="card-body">
					@component('component/formError')
					@endcomponent
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
										<option value="">-----------</option>
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
					@if ($oPhotoalbum->is_published == false)
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('photoalbum.publish.prepare', $oPhotoalbum) }}" class="btn btn-primary">Album publiceren naar Linkedin</a>
                        @endif
					@endif
				</div>
			</div>
			<br>
			<div class="card">
				<div class="card-header">
					Foto's toevoegen aan het album
				</div>
				<div class="card-body">
					<form action="{{ route('photoalbum.store.photo', $oPhotoalbum->id) }}" method="post"
						enctype="multipart/form-data" class="form editer-form">
						@component('component.formError')
						@endcomponent
						@csrf
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
		<div class="col-7">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Foto's</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($oPhotoalbum->photos as $oImage)
					<tr>
						<td>
							<img class="img-thumbnail rounded mx-auto d-block" src="{{$oImage->image_src}}">
						</td>
						<td>
							<a class="btn btn-primary" href="{{ route('photoalbum.photo.create', $oImage) }}">
								Bewerken
							</a>
							<a class="btn btn-danger" href=" {{ route('photoalbum.delete.photo', $oImage->id)}}">
								Verwijderen
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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
