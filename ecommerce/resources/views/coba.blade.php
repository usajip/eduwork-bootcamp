@extends('layout')
@section('title', 'Contoh Halaman Blade')
@section('header', 'Ini Halaman Contoh')
@section('content')
    <h1>{{ $title }}</h1>
    @if($ifLogin)
    <p>ini if login</p>
    @else
    <p>ini else if login</p>
    @endif
    <ol>
        @foreach($products as $value)
        <li>{{ $value }}</li>
        @endforeach
    </ol>
    <x-alert>
        <p>ini teks alert</p>
    </x-alert>
@endsection