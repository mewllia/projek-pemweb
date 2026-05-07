<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans'; 

    protected $fillable = [
        'ruangan_id', 'hari', 'jam_mulai', 'jam_selesai', 'kegiatan'
    ];
}
