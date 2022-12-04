@extends('layout.main')

@section('content')
  <center>
    <h2>Tambah Data Jurusan</h2>

    <form action="/jurusan/store" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">NAMA JURUSAN</td>
          <td width="25%"><input type="text" name="nama_jurusan"></td>
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