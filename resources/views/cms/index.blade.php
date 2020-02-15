<a href="{{@route('cms.create')}}">
  <button type="button" class="btn btn-primary">Pagina toevoegen</button>
</a>
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
          <a href="{{ route('cms.edit', $Page->page_id) }}">Edit page</a>
          <a href="{{ route('cms.delete', $Page->page_id) }}">Delete page</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
