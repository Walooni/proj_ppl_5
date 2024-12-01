<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ruang extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model
    protected $table = 'ruang';

    protected $fillable = [
        'id_ruang',
        'blok_gedung',
        'lantai',
        'kapasitas'
    ];

    // Relasi dengan model lain
    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'id_ruang', 'id_ruang');
    }

    
}
