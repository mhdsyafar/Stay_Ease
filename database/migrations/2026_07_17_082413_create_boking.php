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
        Schema::create('boking', function (Blueprint $table) {
            $table->id('id_boking');
            $table->foreignId('id_kamar')->references('id_kamar')->on('kamar')->cascadeOnDelete();
            $table->foreignId('id_user')->references('id')->on('users')->cascadeOnDelete();
            $table->date('tanggal_boking');
            $table->date('tanggal_check_in');
            $table->date('tanggal_check_out');
            $table->enum('status_boking', ['pending', 'dikonfirmasi', 'selesai', 'batal'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boking');
    }
};
