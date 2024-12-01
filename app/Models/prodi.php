<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory;

    // Tabel yang digunakan oleh model
    protected $table = 'prodi';

    protected $fillable = [
        'id_prodi',
        'nama_prodi',
        'strata',
        'id_fakultas'
    ];

    // Relasi dengan model lain
    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'id_prodi', 'id_prodi');
    }
    

}
