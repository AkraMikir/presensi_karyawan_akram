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
        Schema::create('jabatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan');
            $table->text('deskripsi')->nullable();
            $table->decimal('gaji_pokok', 12, 2)->nullable();
            $table->string('level_jabatan')->nullable(); // Manager, Supervisor, Staff, dll
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Index untuk optimasi query
            $table->index('nama_jabatan');
            $table->index('level_jabatan');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan');
    }
};
