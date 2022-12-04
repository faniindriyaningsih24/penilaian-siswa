@extends('layout.main')

@section('content')
  <center>
    <h2>Data Kelas</h2>

    <a href="/kelas/create" class="button">Tambah data kelas</a>

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
        <th>JURUSAN</th>
        <th>ACTION</th>
      </tr>
      @foreach ($kelas as $k)
        <tr align="center">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->nama_kelas }}</td>
          <td>{{ $k->jurusan->nama_jurusan }}</td>
          <td>
            <a href="/kelas/edit/{{ $k->id_kelas }}">Edit</a>
            <a href="/kelas/destroy/{{ $k->id_kelas }}" onclick="return confirm('Sure?')">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </center>
@endsection