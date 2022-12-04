@extends('layout.main')

@section('content')
  <center>
    <h2>Edit Data Siswa</h2>

    <form action="/siswa/update/{{ $siswa->nis }}" method="post">
      @csrf
      <table width="50%">
        <tr>
          <td width="25%">NIS</td>
          <td width="25%"><input type="text" name="nis" value="{{ $siswa->nis }}"></td>
        </tr>
        <tr>
          <td width="25%">NAMA SISWA</td>
          <td width="25%"><input type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}"></td>
        </tr>
        <tr>
          <td width="25%">JENIS KELAMIN</td>
          <td width="25%">
            <input type="radio" name="jk" value="L" {{ $siswa->jk == 'L' ? 'checked' : '' }}> Laki-Laki
            <input type="radio" name="jk" value="P" {{ $siswa->jk == 'P' ? 'checked' : '' }}> Perempuan
          </td>
        </tr>
        <tr>
          <td width="25%">ALAMAT</td>
          <td width="25%">
            <textarea name="alamat" cols="30" rows="5">{{ $siswa->alamat }}</textarea>
          </td>
        </tr>
        <tr>
          <td width="25%">KELAS</td>
          <td width="25%">
            <select name="id_kelas">
              <option></option>
              @foreach ($kelas as $k)
                @if ($siswa->id_kelas == $k->id_kelas)
                  <option value="{{ $k->id_kelas }}" selected>{{ $k->nama_kelas }}</option>
                @else
                  <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                @endif
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td width="25%">PASSWORD</td>
          <td width="25%"><input type="text" name="password" value="{{ $siswa->password }}"></td>
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