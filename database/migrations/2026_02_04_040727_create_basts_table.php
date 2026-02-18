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
        Schema::create('basts', function (Blueprint $table) {
            $table->id();
            $table->string('no_bast')->unique()->nullable();
            $table->date('tanggal');
            $table->string('pihak_pertama_nama');
            $table->string('pihak_pertama_jabatan')->nullable();
            $table->string('pihak_pertama_perusahaan')->nullable();
            $table->string('pihak_kedua_nama');
            $table->string('pihak_kedua_jabatan')->nullable();
            $table->string('pihak_kedua_perusahaan')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['draft', 'selesai'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('basts');
    }
};
