@extends('layout.main')

@section('content')
  <center>
    <h2>Data Siswa</h2>

    <a href="/siswa/create" class="button">Tambah data siswa</a>

    @if (session('success'))
      <p class="text-success">{{ session('success') }}</p>
    @endif

    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <th>NO</th>
        <th>NIS</th>
        <th>NAMA</th>
        <th>JENIS KELAMIN</th>
        <th>ALAMAT</th>
        <th>KELAS</th>
        <th>PASSWORD</th>
        <th>ACTION</th>
      </tr>
      @foreach ($siswa as $s)
        <tr align="center">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $s->nis }}</td>
          <td>{{ $s->nama_siswa }}</td>
          <td>{{ $s->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
          <td>{{ $s->alamat }}</td>
          <td>{{ $s->kelas->nama_kelas }}</td>
          <td>{{ $s->password }}</td>
          <td>
            <a href="/siswa/edit/{{ $s->nis }}">Edit</a>
            <a href="/siswa/destroy/{{ $s->nis }}" onclick="return confirm('Sure?')">Delete</a>
          </td>
        </tr>
      @endforeach
    </table>
  </center>
@endsection