<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mengajar;

class GuruController extends Controller
{
  public function index()
  {
    return view('guru.index', [
      'guru' => Guru::all()
    ]);
  }

  public function create()
  {
    return view('guru.create');
  }

  public function store(Request $request)
  {
    $data_guru = $request->validate([
      'nip' => ['required'],
      'nama_guru' => ['required'],
      'jk' => ['required'],
      'alamat' => ['required'],
      'password' => ['required'],
    ]);

    Guru::create($data_guru);

    return redirect('/guru/index')->with('success', 'Data guru berhasil di tambah');
  }

  public function edit(Guru $guru)
  {
    return view('guru.edit', [
      'guru' => Guru::where('nip', $guru->nip)->first()
    ]);
  }

  public function update(Request $request, Guru $guru)
  {
    $data_guru = $request->validate([
      'nip' => ['required'],
      'nama_guru' => ['required'],
      'jk' => ['required'],
      'alamat' => ['required'],
      'password' => ['required'],
    ]);

    $guru->update($data_guru);

    return redirect('/guru/index')->with('success', 'Data guru berhasil di ubah');
  }

  public function destroy(Guru $guru)
  {
    $mengajar = Mengajar::where('nip', $guru->nip)->first();

    if ($mengajar) {
      return back()->with('error', "$guru->nama_guru masih digunakan di menu mengajar");
    }
    
    $guru->delete();

    return back()->with('success', "Data $guru->nama_guru berhasil di hapus");
  }
}
