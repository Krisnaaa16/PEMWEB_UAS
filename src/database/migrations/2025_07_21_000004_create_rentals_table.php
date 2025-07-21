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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('rental_code')->unique(); // Kode sewa unik
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Staff yang menangani
            $table->date('start_date');
            $table->date('end_date');
            $table->date('actual_return_date')->nullable();
            $table->decimal('total_amount', 12, 2);
            $table->decimal('security_deposit', 12, 2)->default(0);
            $table->decimal('late_fee', 10, 2)->default(0);
            $table->decimal('damage_fee', 10, 2)->default(0);
            $table->enum('status', ['pending', 'confirmed', 'active', 'returned', 'overdue', 'cancelled'])->default('pending');
            $table->text('notes')->nullable();
            $table->text('return_notes')->nullable();
            $table->json('pickup_photos')->nullable(); // Foto saat pengambilan
            $table->json('return_photos')->nullable(); // Foto saat pengembalian
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('picked_up_at')->nullable();
            $table->timestamp('returned_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
