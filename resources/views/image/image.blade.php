@extends('layout')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1>Carrousel</h1>
        </div>
        <div class="col-4">
          <div class="jumbotron">
            @component('component/formError')
            @endcomponent
              <form action="{{ route('image.store.post') }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="filepath">Foto uploaden</label>
                    <input type="file" name="filepath" class="form-control-file" id="filepath">
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary btn-lg">Opslaan</button>
              </form>
          </div>
        </div>
        <div class="col-8">
          <table class="table">
            <thead>
              <th>Afbeelding</th>
              <th></th>
            </thead>
            <tbody>
              @foreach($aImages as $oImage)
                <tr>
                  <td>
                    <img class="img-thumbnail rounded mx-auto d-block" src="{{$oImage->image_src}}">
                  </td>
                  <td>
                    <a class="btn btn-danger" href="{{ route('image.delete', $oImage->id)}}">Verwijderen</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection