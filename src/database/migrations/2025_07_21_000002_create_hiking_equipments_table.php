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
        Schema::create('hiking_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->decimal('price_per_day', 10, 2);
            $table->integer('stock_total');
            $table->integer('stock_available');
            $table->string('brand')->nullable();
            $table->string('condition')->default('good'); // good, fair, excellent
            $table->json('specifications')->nullable(); // JSON untuk spesifikasi detail
            $table->json('images')->nullable(); // JSON array untuk multiple images
            $table->string('size')->nullable(); // S, M, L, XL atau ukuran spesifik
            $table->decimal('weight', 8, 2)->nullable(); // dalam kg
            $table->text('rental_terms')->nullable(); // syarat dan ketentuan sewa
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->decimal('security_deposit', 10, 2)->default(0); // jaminan
            $table->integer('min_rental_days')->default(1);
            $table->integer('max_rental_days')->default(7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiking_equipments');
    }
};
