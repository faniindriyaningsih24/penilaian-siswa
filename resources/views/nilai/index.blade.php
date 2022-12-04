@extends('layout.main')

@section('content')
  <center>
    <h2>Data Nilai</h2>

    @if (session('role') == 'guru')
      <a href="/nilai/create" class="button">Tambah data nilai</a>
    @endif

    @if (session('success'))
      <p class="text-success">{{ session('success') }}</p>
    @endif

    <table border="1" cellspacing="0" cellpadding="10">
      <tr>
        <th>NO</th>
        <th>MAPEL</th>
        <th>NAMA SISWA</th>
        <th>UH</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>NA</th>
        @if (session('role') == 'guru')
          <th>ACTION</th>
        @endif
      </tr>
      @foreach ($nilai as $n)
        <tr align="center">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $n->mengajar->mapel->nama_mapel }}</td>
          <td>{{ $n->siswa->nama_siswa }}</td>
          <td>{{ $n->uh }}</td>
          <td>{{ $n->uts }}</td>
          <td>{{ $n->uas }}</td>
          <td>{{ $n->na }}</td>
          @if (session('role') == 'guru')
            <td>
              <a href="/nilai/edit/{{ $n->id_nilai }}">Edit</a>
              <a href="/nilai/destroy/{{ $n->id_nilai }}" onclick="return confirm('Sure?')">Delete</a>
            </td>
          @endif
        </tr>
      @endforeach
    </table>
  </center>
@endsection