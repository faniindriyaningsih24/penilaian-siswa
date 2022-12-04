@extends('layout.main')

@section('content')
  <center>
    <h2>Edit Data Jurusan</h2>

    <form action="/jurusan/update/{{ $jurusan->id_jurusan }}" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">NAMA JURUSAN</td>
          <td width="25%"><input type="text" name="nama_jurusan" value="{{ $jurusan->nama_jurusan }}"></td>
        </tr>
        <tr>
          <td colspan="2">
            <center>
              <button class="button" type="submit">Edit</button>
            </center>
          </td>
        </tr>
      </table>
    </form>
  </center>
@endsection