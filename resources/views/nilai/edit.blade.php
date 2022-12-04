@extends('layout.main')

@section('content')
  <center>
    <h2>Edit Data Nilai</h2>

    <form action="/nilai/update/{{ $nilai->id_nilai }}" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">MAPEL</td>
          <td width="25%">
            <select name="id_mengajar">
              <option></option>
              @foreach ($mengajar as $m)
                @if ($nilai->id_mengajar == $m->id_mengajar)
                  <option value="{{ $m->id_mengajar }}" selected>{{ $m->mapel->nama_mapel   }}</option>
                @else
                  <option value="{{ $m->id_mengajar }}">{{ $m->mapel->nama_mapel   }}</option>
                @endif
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
                @if ($nilai->nis == $s->nis)
                  <option value="{{ $s->nis }}" selected>{{ $s->nama_siswa }}</option>
                @else
                  <option value="{{ $s->nis }}">{{ $s->nama_siswa }}</option>
                @endif
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td width="25%">UH</td>
          <td width="25%"><input type="number" name="uh" value="{{ $nilai->uh }}"></td>
        </tr>
        <tr>
          <td width="25%">UTS</td>
          <td width="25%"><input type="number" name="uts" value="{{ $nilai->uts }}"></td>
        </tr>
        <tr>
          <td width="25%">UAS</td>
          <td width="25%"><input type="number" name="uas" value="{{ $nilai->uas }}"></td>
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