@extends('layouts.main')
@section('container')
    <h1>Halaman About</h1>
    <h5>{{ $nama }}</h5>
    <h5>{{ $email }}</h5>
    <img src="img/{{ $img }}" alt="{{ $nama }}" width="300">
    @endsection
 