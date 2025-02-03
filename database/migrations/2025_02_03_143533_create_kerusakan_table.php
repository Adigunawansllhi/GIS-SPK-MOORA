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
        Schema::create('kerusakan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_infrastruktur'); // Nama infrastruktur yang rusak
            $table->string('jenis_infrastruktur'); // Jenis infrastruktur (jalan, jembatan, dll.)
            $table->string('alamat'); // Lokasi kerusakan
            $table->text('deskripsi'); // Deskripsi kerusakan
            $table->decimal('latitude', 10, 7)->nullable(); // Latitude
            $table->decimal('longitude', 10, 7)->nullable(); // Longitude
            $table->string('status')->default('Belum Diperbaiki'); // Status kerusakan
            $table->date('tanggal_kerusakan'); // Tanggal kerusakan terjadi
            $table->string('upload_foto')->nullable(); // Kolom untuk menyimpan nama file foto
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerusakan');
    }
};
