@extends('layout.main')

@section('content')
  <center>
    <h2>Data Mengajar</h2>

    <a href="/mengajar/create" class="button">Tambah data mengajar</a>

    @if (session('success'))
      <p class="text-success">{{ session('success') }}</p>
    @endif

    @if (session('error'))
      <p class="text-danger">{{ session('error') }}</p>
    @endif

    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <th>NO</th>
        <th>NAMA GURU</th>
        <th>MAPEL</th>
        <th>KELAS</th>
        <th>ACTION</th>
      </tr>
      @foreach ($mengajar as $m)
        <tr align="center">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $m->guru->nama_guru }}</td>
          <td>{{ $m->mapel->nama_mapel }}</td>
          <td>{{ $m->kelas->nama_kelas }}</td>
          <td>
            <a href="/mengajar/edit/{{ $m->id_mengajar }}">Edit</a>
            <a href="/mengajar/destroy/{{ $m->id_mengajar }}" onclick="return confirm('Sure?')">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </center>
@endsection