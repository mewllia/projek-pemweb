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
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gedung');
            $table->integer('kapasitas');
            $table->text('fasilitas');
            $table->enum('status', ['tersedia', 'tidak_tersedia'])->default('tersedia');;
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};
