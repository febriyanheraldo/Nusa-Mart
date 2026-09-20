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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique(); // Contoh: #ORD-9921
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Customer
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade'); // Seller/Toko
            $table->decimal('total_amount', 12, 2);
            $table->text('shipping_address'); // Alamat Pengiriman Customer
            $table->string('courier')->nullable(); // Ekspedisi (J&T, JNE, SiCepat)
            $table->string('tracking_number')->nullable(); // No. Resi
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
