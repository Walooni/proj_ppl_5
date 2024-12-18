<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    // Relasi ke Dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    // Relasi ke Prodi
    public function prodi()
    {
        return $this->belongsTo(programstudi::class, 'id_prodi', 'id_prodi');
    }

    // Relasi ke IRS
    public function irs()
    {
        return $this->hasMany(irs::class, 'nim', 'nim');
    }

    // Relasi ke Riwayat Status
    public function riwayat_status()
    {
        return $this->hasMany(riwayatstatus::class, 'nim', 'nim');
    }
}
