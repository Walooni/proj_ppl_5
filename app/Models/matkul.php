<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model
    protected $table = 'matakuliah';

    protected $fillable = [
        'kode_mk',
        'nama',
        'sks',
        'plot_semester',
        'jenis',
    ];

    // Relasi dengan model lain
    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'kode_mk', 'kode_mk');
    }
}
