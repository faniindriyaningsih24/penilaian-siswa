@extends('layout.main')

@section('content')
  <center>
    <h2>Tambah Data Nilai</h2>

    <form action="/nilai/store" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">MAPEL</td>
          <td width="25%">
            <select name="id_mengajar">
              <option></option>
              @foreach ($mengajar as $m)
                <option value="{{ $m->id_mengajar }}">{{ $m->mapel->nama_mapel }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td width="25%">SISWA</td>
          <td width="25%">
            <select name="nis">
              <option></option>
              @foreach ($siswa as $s)
                <option value="{{ $s->nis }}">{{ $s->nama_siswa }}</option>
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td width="25%">UH</td>
          <td width="25%"><input type="number" name="uh"></td>
        </tr>
        <tr>
          <td width="25%">UTS</td>
          <td width="25%"><input type="number" name="uts"></td>
        </tr>
        <tr>
          <td width="25%">UAS</td>
          <td width="25%"><input type="number" name="uas"></td>
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