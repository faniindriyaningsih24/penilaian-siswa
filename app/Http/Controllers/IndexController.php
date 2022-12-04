<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrator;
use App\Models\Guru;
use App\Models\Siswa;

class IndexController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function home()
  {
    return view('home');
  }

  public function loginAdmin(Request $request)
  {
    $admin = Administrator::where('kode_admin', $request->kode_admin)->first();

    if (!$admin) {
      return back();
    }

    if ($admin->password != $request->password) {
      return back();
    }

    session([
      'role' => 'admin'
    ]);

    return redirect('/home');
  }

  public function loginGuru(Request $request)
  {
    $guru = Guru::where('nip', $request->nip)->first();

    if (!$guru) {
      return back();
    }

    if ($guru->password != $request->password) {
      return back();
    }

    session([
      'role' => 'guru',
      'nip' => $guru->nip
    ]);

    return redirect('/home');
  }

  public function loginSiswa(Request $request)
  {
    $siswa = Siswa::where('nis', $request->nis)->first();

    if (!$siswa) {
      return back();
    }

    if ($siswa->password != $request->password) {
      return back();
    }

    session([
      'role' => 'siswa',
      'nis' => $siswa->nis
    ]);

    return redirect('/home');
  }

  public function logout(Request $request)
  {
    $request->session()->regenerate();

    return redirect('/');
  }
}
