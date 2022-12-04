<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Mengajar;

class KelasController extends Controller
{
  public function index()
  {
    return view('kelas.index', [
      'kelas' => Kelas::all()
    ]);
  }

  public function create()
  {
    return view('kelas.create', [
      'jurusan' => Jurusan::all()
    ]);
  }

  public function store(Request $request)
  {
    $data_kelas = $request->validate([
      'nama_kelas' => ['required'],
      'id_jurusan' => ['required'],
    ]);

    Kelas::create($data_kelas);

    return redirect('/kelas/index')->with('success', "$request->nama_kelas berhasil di tambah");
  }

  public function edit(Kelas $kelas)
  {
    return view('kelas.edit', [
      'kelas' => $kelas,
      'jurusan' => Jurusan::all()
    ]);
  }

  public function update(Request $request, Kelas $kelas)
  {
    $data_kelas = $request->validate([
      'nama_kelas' => ['required'],
      'id_jurusan' => ['required'],
    ]);

    $kelas->update($data_kelas);

    return redirect('/kelas/index')->with('success', "$kelas->nama_kelas berhasil di ubah");
  }

  public function destroy(Kelas $kelas)
  {
    $siswa = Siswa::where('id_kelas', $kelas->id_kelas)->first();
    $mengajar = Mengajar::where('id_kelas', $kelas->id_kelas)->first();

    if ($siswa) {
      return back()->with('error', "$kelas->nama_kelas masih digunakan di menu siswa");
    }

    if ($mengajar) {
      return back()->with('error', "$kelas->nama_kelas masih digunakan di menu mengajar");
    }

    $kelas->delete();

    return back()->with('success', "$kelas->nama_kelas berhasil di hapus");
  }
}
