<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';
    
    protected $fillable = [
        'nama_divisi',
        'deskripsi',
        'kode_divisi',
        'perusahaan_id',
        'kepala_divisi_id',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get the perusahaan that owns the divisi.
     */
    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(perusahaanModel::class, 'perusahaan_id');
    }

    /**
     * Get the kepala divisi that owns the divisi.
     */
    public function kepalaDivisi(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'kepala_divisi_id');
    }

    /**
     * Get the karyawan for the divisi.
     */
    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class, 'divisi_id');
    }
}
