<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id(); // Primary key auto-increment
            $table->string('name'); // Nama mobil (e.g., Giulia Saloon)
            $table->string('image')->nullable(); // Path gambar utama mobil
            $table->string('price'); // Harga (e.g., Rp.5.288.000,00/bulan)
            $table->string('fuel_image')->nullable(); // Path gambar ikon fuel
            $table->string('fuel_type'); // Tipe fuel (e.g., Petrol Fuel)
            $table->string('gearbox_image')->nullable(); // Path gambar ikon gearbox
            $table->string('gearbox_type'); // Tipe gearbox (e.g., Automatic Gearbox)
            $table->string('paint_image')->nullable(); // Path gambar ikon paint
            $table->string('paint_type'); // Tipe paint (e.g., Flat Paint)
            $table->timestamps(); // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
