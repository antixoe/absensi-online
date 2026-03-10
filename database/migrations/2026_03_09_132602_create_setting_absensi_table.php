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
        Schema::create('setting_absensi', function (Blueprint $table) {
            $table->id();
            $table->time('waktu_buka');
            $table->time('waktu_tutup');
            $table->string('buka_otomatis')->default('ya');
            $table->string('tutup_otomatis')->default('ya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_absensi');
    }
};
