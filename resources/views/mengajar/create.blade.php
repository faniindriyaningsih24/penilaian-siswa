@extends('layout.main')

@section('content')
  <center>
    <h2>Tambah Data Mengajar</h2>

    <form action="/mengajar/store" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">NAMA GURU</td>
          <td width="25%">
            <select name="nip">
              <option></option>
              @foreach ($guru as $g)
                <option value="{{ $g->nip }}">{{ $g->nama_guru }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td width="25%">NAMA MAPEL</td>
          <td width="25%">
            <select name="id_mapel">
              <option></option>
              @foreach ($mapel as $m)
                <option value="{{ $m->id_mapel }}">{{ $m->nama_mapel }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td width="25%">NAMA KELAS</td>
          <td width="25%">
            <select name="id_kelas">
              <option></option>
              @foreach ($kelas as $k)
                <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
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