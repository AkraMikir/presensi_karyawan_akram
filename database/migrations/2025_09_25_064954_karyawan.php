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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('nik', 16)->unique();
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->onDelete('cascade');
            $table->string('jabatan')->nullable();
            $table->string('telepon')->nullable();
            $table->text('alamat')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->enum('status', ['aktif', 'nonaktif', 'cuti'])->default('aktif');
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index(['perusahaan_id', 'status']);
            $table->index('nik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
