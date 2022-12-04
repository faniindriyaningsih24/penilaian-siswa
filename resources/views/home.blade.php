@extends('layout.main')

@section('content')
  <center>
    <h1>Selamat datang {{ session('role') }}</h1>
  </center>
@endsection