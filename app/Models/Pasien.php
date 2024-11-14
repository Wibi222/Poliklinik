<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens'; // Make sure to use the correct table name

    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
    ];

    /**
     * Define the relationship with the Periksa model.
     * Each Pasien can have many Periksa records.
     */
    public function periksa()
    {
        return $this->hasMany(Periksa::class, 'id_pasien');
    }
}
