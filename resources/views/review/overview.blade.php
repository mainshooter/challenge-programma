@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Alle reviews</h1>
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Bedrijf</th>
              <th>Review</th>
              <th>Sterren</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($aReviews as $oReview)
              <tr>
                <td>{{ $oReview->id }}</td>
                <td>{{ $oReview->company->companyInfo->company_name }}</td>
                <td>{!! $oReview->body !!}</td>
                <td>{{ $oReview->rating }}</td>
                <td>
                  <a href="{{ route('review.delete', $oReview->id) }}" class="btn btn-danger">Verwijderen</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
