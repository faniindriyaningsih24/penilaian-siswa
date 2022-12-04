@extends('layout.main')

@section('content')
  <center>
    <h2>Data Jurusan</h2>

    <a href="/jurusan/create" class="button">Tambah data jurusan</a>

    @if (session('success'))
      <p class="text-success">{{ session('success') }}</p>
    @endif

    @if (session('error'))
      <p class="text-danger">{{ session('error') }}</p>
    @endif

    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <th>NO</th>
        <th>NAMA</th>
        <th>ACTION</th>
      </tr>
      @foreach ($jurusan as $j)
        <tr align="center">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $j->nama_jurusan }}</td>
          <td>
            <a href="/jurusan/edit/{{ $j->id_jurusan }}">Edit</a>
            <a href="/jurusan/destroy/{{ $j->id_jurusan }}" onclick="return confirm('Sure?')">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </center>
@endsection