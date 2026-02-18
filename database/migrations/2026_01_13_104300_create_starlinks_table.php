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
        Schema::create('starlinks', function (Blueprint $table) {
            $table->id();
            $table->string('kit_name');
            $table->string('location');
            $table->string('starlink_id')->unique();
            $table->string('router_id')->nullable();
            $table->string('serial_number')->unique();
            $table->enum('status', [
                'new',
                'aktif',
                'standby',
                'suspend',
                'inactive',
            ])->default('new');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('starlinks');
    }
};
