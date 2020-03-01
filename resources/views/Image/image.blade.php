@extends('layout')

@section('content')

    <div class="container">
        {{--//{!! Form::open(['action' => 'ImageController', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::file('filepath')}}
        </div>
        {!! Form::close() !!}--}}
        <div class="form-group">
            {{Form::file('filepath')}}
        </div>
    </div>
@endsection
