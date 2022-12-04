<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Mengajar;
use App\Models\Siswa;

class NilaiController extends Controller
{
  public function index()
  {
    if (session('role') == 'guru') {
      $nilai = Nilai::whereHas('mengajar', function($query) {
        $query->where('nip', session('nip'));
      });
    } else {
      $nilai = Nilai::where('nis', session('nis'));
    }

    return view('nilai.index', [
      'nilai' => $nilai->get()
    ]);
  }

  public function create()
  {
    $mengajar = Mengajar::where('nip', session('nip'));
    $id_kelas = $mengajar->get('id_kelas');

    return view('nilai.create', [
      'mengajar' => $mengajar->get(),
      'siswa' => Siswa::whereIn('id_kelas', $id_kelas)->get()
    ]);
  }

  public function store(Request $request)
  {
    $data_nilai = $request->validate([
      'id_mengajar' => ['required'],
      'nis' => ['required'],
      'uh' => ['required'],
      'uts' => ['required'],
      'uas' => ['required'],
    ]);

    $uh = $request->uh;
    $uts = $request->uts;
    $uas = $request->uas;

    $data_nilai['na'] = round(($uh + $uts + $uas) / 3);

    Nilai::create($data_nilai);

    return redirect('/nilai/index')->with('succes', 'Data nilai berhasil di tambah');
  }

  public function edit(Nilai $nilai)
  {
    $mengajar = Mengajar::where('nip', session('nip'));
    $id_kelas = $mengajar->get('id_kelas');

    return view('nilai.edit', [
      'nilai' => $nilai,
      'mengajar' => $mengajar->get(),
      'siswa' => Siswa::whereIn('id_kelas', $id_kelas)->get()
    ]);
  }

  public function update(Request $request, Nilai $nilai)
  {
    $data_nilai = $request->validate([
      'id_mengajar' => ['required'],
      'nis' => ['required'],
      'uh' => ['required'],
      'uts' => ['required'],
      'uas' => ['required'],
    ]);

    $uh = $request->uh;
    $uts = $request->uts;
    $uas = $request->uas;

    $data_nilai['na'] = round(($uh + $uts + $uas) / 3);

    $nilai->update($data_nilai);

    return redirect('/nilai/index')->with('succes', 'Data nilai berhasil di ubah');
  }

  public function destroy(Nilai $nilai)
  {
    $nilai->delete();

    return back()->with('succes', 'Data nilai berhasil di hapus');
  }
}
