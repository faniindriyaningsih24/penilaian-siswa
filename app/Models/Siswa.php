<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
  use HasFactory;

  protected $table = 'siswa';
  protected $fillable = ['nis', 'nama_siswa', 'jk', 'alamat', 'id_kelas', 'password'];
  protected $primaryKey = 'nis';
  public $timestamps = false;

  public function kelas()
  {
    return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
  }
}
