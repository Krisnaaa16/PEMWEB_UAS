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
        Schema::create('rental_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');
            $table->foreignId('hiking_equipment_id')->constrained('hiking_equipments')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price_per_day', 10, 2);
            $table->decimal('subtotal', 12, 2);
            $table->text('condition_notes')->nullable(); // Catatan kondisi saat pengambilan
            $table->text('return_condition_notes')->nullable(); // Catatan kondisi saat pengembalian
            $table->enum('return_condition', ['good', 'fair', 'damaged', 'lost'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_items');
    }
};
