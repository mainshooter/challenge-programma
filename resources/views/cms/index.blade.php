@extends('layout')

@section('content')
<div class="container no-max-width">
  <div class="row">
    <div class="col-2">
    </div>
    <div class="col-8">
      <a href="{{@route('cms.create')}}">
        <button type="button" class="btn btn-primary">Pagina toevoegen</button>
      </a>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th>Titel</th>
            <th>Laatst ge-update</th>
            <th><th>
          </tr>
        </thead>
        <tbody>
          @foreach($Pages as $Page)
            <tr>
              <td>{{$Page->title}}</td>
              <td>{{$Page->last_update}}</td>
              <td>
                <a href="{{ route('cms.edit', $Page->page_id) }}" class="btn btn-secondary">Bewerk</a>
                <a href="{{ route('cms.delete', $Page->page_id) }}" class="btn btn-danger">Verwijder</a>
                <a target="_blank" href="{{ route('cms.view', $Page->slug) }}" class="btn btn-link">Bekijk</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-2">
    </div>
  </div>
</div>

@endsection
