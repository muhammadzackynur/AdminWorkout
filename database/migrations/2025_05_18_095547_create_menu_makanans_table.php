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
        Schema::create('menu_makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_makanan');
            $table->integer('kalori');
            $table->text('deskripsi')->nullable();
            $table->text('bahan')->nullable();
            $table->string('image')->nullable(); // untuk path gambar, bukan file langsung
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_makanans');
    }
};
