@extends('layout')

@section('content')
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
          <a href="{{ route('cms.edit', $Page->page_id) }}" class="btn btn-secondary">Edit</a>
          <a href="{{ route('cms.delete', $Page->page_id) }}" class="btn btn-danger">Delete</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
