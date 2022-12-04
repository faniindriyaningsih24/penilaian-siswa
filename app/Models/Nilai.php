<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
  use HasFactory;

  protected $table = 'nilai';
  protected $guarded = ['id_nilai'];
  protected $primaryKey = 'id_nilai';
  public $timestamps = false;

  public function mengajar()
  {
    return $this->belongsTo(Mengajar::class, 'id_mengajar', 'id_mengajar');
  }

  public function siswa()
  {
    return $this->belongsTo(Siswa::class, 'nis', 'nis');
  }
}
