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
        Schema::create('favorites', function (Blueprint $table) {
        $table->id(); // Boleh disertakan, boleh dihapus
        
        // 1. Relasi ke tabel users
        $table->foreignId('user_id')
              ->constrained()
              ->onDelete('cascade');
              
        // 2. Relasi ke tabel destinations
        $table->foreignId('destination_id')
              ->constrained()
              ->onDelete('cascade');

        $table->timestamps(); // Membuat kolom created_at dan updated_at
        
        // (Opsional) Mencegah 1 user menyukai wisata yang sama berkali-kali
        // $table->unique(['user_id', 'destination_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
