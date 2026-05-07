<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $fillable = [
        'nama', 'gedung', 'kapasitas', 'fasilitas'
    ];
    public function peminjamans()
    {
        // "Satu Ruangan memiliki BANYAK Peminjaman"
        return $this->hasMany(Peminjaman::class, 'ruangan_id');
    }
}
