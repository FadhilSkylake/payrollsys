<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiModel extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'id';
    protected $fillable = ['pegawai_id', 'tanggal', 'jam_masuk', 'jam_pulang', 'keterlambatan', 'kehadiran', 'kehadiran', 'created_at', 'updated_at'];
}
