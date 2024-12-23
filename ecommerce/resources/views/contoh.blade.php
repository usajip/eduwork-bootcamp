@extends('layout')
@section('title', 'Contoh Halaman Blade')
@section('header', $title)
@section('content')
    <ol>
        @foreach($products as $value)
        <li>{{ $value }}</li>
        @endforeach
    </ol>
@endsection