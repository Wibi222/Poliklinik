<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $table = 'periksa';

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'obat',
    ];

    /**
     * Define the relationship with the Pasien model.
     * Each Periksa belongs to one Pasien.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    /**
     * Define the relationship with the Dokter model.
     * Each Periksa belongs to one Dokter.
     */
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}
