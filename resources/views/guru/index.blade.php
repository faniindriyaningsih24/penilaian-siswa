@extends('layout.main')

@section('content')
  <center>
    <h2>Data Guru</h2>

    <a href="/guru/create" class="button">Tambah data guru</a>

    @if (session('success'))
      <p class="text-success">{{ session('success') }}</p>
    @endif

    @if (session('error'))
      <p class="text-danger">{{ session('error') }}</p>
    @endif

    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <th>NO</th>
        <th>NIP</th>
        <th>NAMA</th>
        <th>JENIS KELAMIN</th>
        <th>ALAMAT</th>
        <th>PASSWORD</th>
        <th>ACTION</th>
      </tr>
      @foreach ($guru as $g)
        <tr align="center">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $g->nip }}</td>
          <td>{{ $g->nama_guru }}</td>
          <td>{{ $g->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
          <td>{{ $g->alamat }}</td>
          <td>{{ $g->password }}</td>
          <td>
            <a href="/guru/edit/{{ $g->nip }}">Edit</a>
            <a href="/guru/destroy/{{ $g->nip }}" onclick="return confirm('Sure?')">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </center>
@endsection