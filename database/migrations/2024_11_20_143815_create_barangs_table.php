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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('nama');
            $table->string('harga');
            $table->string('deskripsi')->nullable();
            $table->integer('stok');
            $table->foreignId('kategori_id')->constrained()->cascadeOnDelete();;
            $table->foreignId('pemasok_id')->constrained()->cascadeOnDelete();
            $table->foreignId('gudang_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
