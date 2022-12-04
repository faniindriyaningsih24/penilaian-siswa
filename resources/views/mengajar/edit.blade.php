@extends('layout.main')

@section('content')
  <center>
    <h2>Edit Data Mengajar</h2>

    <form action="/mengajar/update/{{ $mengajar->id_mengajar }}" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">NAMA GURU</td>
          <td width="25%">
            <select name="nip">
              <option></option>
              @foreach ($guru as $g)
                @if ($mengajar->nip == $g->nip)
                  <option value="{{ $g->nip }}" selected>{{ $g->nama_guru }}</option>
                @else
                  <option value="{{ $g->nip }}">{{ $g->nama_guru }}</option>
                @endif
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
                @if ($mengajar->id_mapel == $m->id_mapel)
                  <option value="{{ $m->id_mapel }}" selected>{{ $m->nama_mapel }}</option>
                @else
                  <option value="{{ $m->id_mapel }}">{{ $m->nama_mapel }}</option>
                @endif
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
                @if ($mengajar->id_kelas == $k->id_kelas)
                  <option value="{{ $k->id_kelas }}" selected>{{ $k->nama_kelas }}</option>
                @else
                  <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                @endif
              @endforeach
            </select>
          </td>
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