<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'perusahaan_id',
        'divisi_id',
        'jabatan_id',
        'telepon',
        'alamat',
        'tanggal_masuk',
        'status'
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_masuk' => 'date'
    ];

    /**
     * Get the user that owns the karyawan.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the perusahaan that owns the karyawan.
     */
    public function perusahaan(): BelongsTo
    {
        return $this->belongsTo(perusahaanModel::class, 'perusahaan_id');
    }

    /**
     * Get the divisi that owns the karyawan.
     */
    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    /**
     * Get the jabatan that owns the karyawan.
     */
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    /**
     * Get the presensi for the karyawan.
     */
    public function presensi(): HasMany
    {
        return $this->hasMany(Presensi::class, 'karyawan_id');
    }
}
