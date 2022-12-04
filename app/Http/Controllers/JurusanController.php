<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Kelas;

class JurusanController extends Controller
{
  public function index()
  {
    return view('jurusan.index', [
      'jurusan' => Jurusan::all()
    ]);
  }

  public function create()
  {
    return view('jurusan.create');
  }

  public function store(Request $request)
  {
    $data_jurusan = $request->validate([
      'nama_jurusan' => ['required']
    ]);

    Jurusan::create($data_jurusan);

    return redirect('/jurusan/index')->with('success', "$request->nama_jurusan berhasil di tambah");
  }

  public function edit(Jurusan $jurusan)
  {
    return view('jurusan.edit', [
      'jurusan' => $jurusan
    ]);
  }

  public function update(Request $request, Jurusan $jurusan)
  {
    $data_jurusan = $request->validate([
      'nama_jurusan' => ['required']
    ]);

    $jurusan->update($data_jurusan);

    return redirect('/jurusan/index')->with('success', "$jurusan->nama_jurusan berhasil di ubah");
  }

  public function destroy(Jurusan $jurusan)
  {
    $kelas = Kelas::where('id_jurusan', $jurusan->id_jurusan)->first();

    if ($kelas) {
      return back()->with('error', "$jurusan->nama_jurusan masih di gunakan di menu kelas");
    }
    
    $jurusan->delete();

    return back()->with('success', "$jurusan->nama_jurusan berhasil di hapus");
  }
}
