@extends('layout.main')

@section('content')
  <center>
    <h2>Tambah Data Kelas</h2>

    <form action="/kelas/store" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">NAMA KELAS</td>
          <td width="25%"><input type="text" name="nama_kelas"></td>
        </tr>
        <tr>
          <td width="25%">NAMA JURUSAN</td>
          <td width="25%">
            <select name="id_jurusan">
              <option></option>
              @foreach ($jurusan as $j)
                <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <center>
              <button class="button" type="submit">Tambah</button>
            </center>
          </td>
        </tr>
      </table>
    </form>
  </center>
@endsection