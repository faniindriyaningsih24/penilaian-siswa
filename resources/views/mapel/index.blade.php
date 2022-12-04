@extends('layout.main')

@section('content')
  <center>
    <h2>Data Mapel</h2>

    <a href="/mapel/create" class="button">Tambah data mapel</a>

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
      @foreach ($mapel as $m)
        <tr align="center">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $m->nama_mapel }}</td>
          <td>
            <a href="/mapel/edit/{{ $m->id_mapel }}">Edit</a>
            <a href="/mapel/destroy/{{ $m->id_mapel }}" onclick="return confirm('Sure?')">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </center>
@endsection