<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mengajar extends Model
{
  use HasFactory;

  protected $table = 'mengajar';
  protected $guarded = ['id_mengajar'];
  protected $primaryKey = 'id_mengajar';
  public $timestamps = false;

  public function guru()
  {
    return $this->belongsTo(Guru::class, 'nip', 'nip');
  }

  public function mapel()
  {
    return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
  }

  public function kelas()
  {
    return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
  }
}
