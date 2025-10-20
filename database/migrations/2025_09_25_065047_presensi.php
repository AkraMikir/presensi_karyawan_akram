<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawan')->onDelete('cascade');
            $table->date('tanggal_presensi');
            $table->time('jam_masuk')->nullable();
            $table->time('jam_keluar')->nullable();
            $table->string('foto_masuk')->nullable();
            $table->string('foto_keluar')->nullable();
            $table->decimal('latitude_masuk', 10, 8)->nullable();
            $table->decimal('longitude_masuk', 11, 8)->nullable();
            $table->decimal('latitude_keluar', 10, 8)->nullable();
            $table->decimal('longitude_keluar', 11, 8)->nullable();
            $table->enum('status', ['hadir', 'terlambat', 'tidak_hadir', 'cuti', 'sakit'])->default('hadir');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index(['karyawan_id', 'tanggal_presensi']);
            $table->index('tanggal_presensi');
            $table->index('status');
            
            // Unique constraint untuk mencegah presensi ganda dalam satu hari
            $table->unique(['karyawan_id', 'tanggal_presensi']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
