<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mengajar;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Nilai;

class MengajarController extends Controller
{
  public function index()
  {
    return view('mengajar.index', [
      'mengajar' => Mengajar::all()
    ]);
  }

  public function create()
  {
    return view('mengajar.create', [
      'guru' => Guru::all(),
      'mapel' => Mapel::all(),
      'kelas' => Kelas::all()
    ]);
  }

  public function store(Request $request)
  {
    $data_mengajar = $request->validate([
      'nip' => ['required'],
      'id_mapel' => ['required'],
      'id_kelas' => ['required'],
    ]);

    Mengajar::create($data_mengajar);

    return redirect('/mengajar/index')->with('success', 'Data berhasil di tambah');
  }

  public function edit(Mengajar $mengajar)
  {
    return view('mengajar.edit', [
      'mengajar' => $mengajar,
      'guru' => Guru::all(),
      'mapel' => Mapel::all(),
      'kelas' => Kelas::all()
    ]);
  }

  public function update(Request $request, Mengajar $mengajar)
  {
    $data_mengajar = $request->validate([
      'nip' => ['required'],
      'id_mapel' => ['required'],
      'id_kelas' => ['required'],
    ]);

    $mengajar->update($data_mengajar);

    return redirect('/mengajar/index')->with('success', 'Data berhasil di ubah');
  }

  public function destroy(Mengajar $mengajar)
  {
    $nilai = Nilai::where('id_mengajar', $mengajar->id_mengajar)->first();

    if ($nilai) {
      return back()->with('error', 'Data mengajar masih digunakan di menu nilai');
    }
    
    $mengajar->delete();

    return back()->with('success', 'Data berhasil di hapus');
  }
}
