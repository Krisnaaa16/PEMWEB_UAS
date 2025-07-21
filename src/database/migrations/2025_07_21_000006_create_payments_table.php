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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');
            $table->string('payment_code')->unique();
            $table->decimal('amount', 12, 2);
            $table->enum('type', ['rental', 'deposit', 'late_fee', 'damage_fee', 'refund']);
            $table->enum('method', ['cash', 'transfer', 'card', 'ewallet']);
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])->default('pending');
            $table->text('description')->nullable();
            $table->string('reference_number')->nullable(); // Nomor referensi bank/payment gateway
            $table->json('payment_proof')->nullable(); // Foto bukti pembayaran
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
