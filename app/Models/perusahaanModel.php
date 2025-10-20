<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class perusahaanModel extends Model
{
    protected $table = 'perusahaan';
    
    protected $fillable = [
        'nama',
        'alamat',
        'latitude',
        'longitude',
        'telepon',
        'email'
    ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    /**
     * Get the karyawan for the perusahaan.
     */
    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'perusahaan_id');
    }
}
