<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $table = 'tahun_ajaran';

    protected $fillable = [
        'id_tahun',
        'tahun_ajaran',
    ];

    public function jadwal()
    {
        return $this->hasMany(jadwal::class, 'id_tahun', 'id_tahun');
    }
}
