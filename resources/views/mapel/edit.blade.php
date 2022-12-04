@extends('layout.main')

@section('content')
  <center>
    <h2>Edit Data Mapel</h2>

    <form action="/mapel/update/{{ $mapel->id_mapel }}" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">NAMA MAPEL</td>
          <td width="25%"><input type="text" name="nama_mapel" value="{{ $mapel->nama_mapel }}"></td>
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