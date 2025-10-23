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
        Schema::create('divisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_divisi');
            $table->text('deskripsi')->nullable();
            $table->string('kode_divisi')->unique();
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->onDelete('cascade');
            $table->unsignedBigInteger('kepala_divisi_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index('nama_divisi');
            $table->index('kode_divisi');
            $table->index('perusahaan_id');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisi');
    }
};
