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
        Schema::create('homework', function (Blueprint $table) {
            $table->id();
            $table->string('nama_latihan');
            $table->string('kategori'); // dropdown
            $table->string('alat');     // dropdown
            $table->text('deskripsi')->nullable();
            $table->string('image')->nullable(); // path gambar
            $table->integer('sets');
            $table->integer('repetisi');
            $table->string('video')->nullable(); // path video
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homework');
    }
};
