@extends('layout')

@section('content')
    {!! Menu::render() !!}
@endsection

@section('scripts')
    {!! Menu::scripts() !!}
@endsection
