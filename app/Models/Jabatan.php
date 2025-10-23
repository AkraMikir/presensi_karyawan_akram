<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = 'jabatan';
    
    protected $fillable = [
        'nama_jabatan',
        'deskripsi',
        'gaji_pokok',
        'level_jabatan',
        'is_active'
    ];

    protected $casts = [
        'gaji_pokok' => 'decimal:2',
        'is_active' => 'boolean'
    ];

    /**
     * Get the karyawan for the jabatan.
     */
    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'jabatan_id');
    }
}
