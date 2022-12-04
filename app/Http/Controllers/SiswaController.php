<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
  public function index()
  {
    return view('siswa.index', [
      'siswa' => Siswa::all()
    ]);
  }

  public function create()
  {
    return view('siswa.create', [
      'kelas' => Kelas::all()
    ]);
  }

  public function store(Request $request)
  {
    $data_siswa = $request->validate([
      'nis' => ['required'],
      'nama_siswa' => ['required'],
      'jk' => ['required'],
      'alamat' => ['required'],
      'id_kelas' => ['required'],
      'password' => ['required'],
    ]);

    Siswa::create($data_siswa);

    return redirect('/siswa/index')->with('success', "$request->nama_siswa berhasil di tambah");
  }

  public function edit(Siswa $siswa)
  {
    return view('siswa.edit', [
      'siswa' => $siswa,
      'kelas' => Kelas::all()
    ]);
  }

  public function update(Request $request, Siswa $siswa)
  {
    $data_siswa = $request->validate([
      'nis' => ['required'],
      'nama_siswa' => ['required'],
      'jk' => ['required'],
      'alamat' => ['required'],
      'id_kelas' => ['required'],
      'password' => ['required'],
    ]);

    $siswa->update($data_siswa);

    return redirect('/siswa/index')->with('success', "$siswa->nama_siswa berhasil di ubah");
  }

  public function destroy(Siswa $siswa)
  {
    $siswa->delete();

    return back()->with('success', "$siswa->nama_siswa berhasil di hapus");
  }
}
