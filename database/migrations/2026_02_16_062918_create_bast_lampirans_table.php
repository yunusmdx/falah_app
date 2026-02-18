<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bast_lampirans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('bast_id')
                ->constrained('basts')
                ->cascadeOnDelete();

            $table->foreignId('starlink_id')
                ->constrained('starlinks')
                ->cascadeOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bast_lampirans');
    }
};
