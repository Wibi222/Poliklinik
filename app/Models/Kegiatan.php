<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang benar di sini
    protected $table = 'kegiatan'; // Nama tabel di database kamu adalah 'kegiatan'

    protected $fillable = ['isi', 'tgl_awal', 'tgl_akhir', 'status'];

    public $timestamps = false;
}
