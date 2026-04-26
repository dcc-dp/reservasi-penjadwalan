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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reservasi_id')
                ->constrained('reservasis')
                ->cascadeOnDelete();

            $table->string('order_id')->unique();
            $table->string('snap_token')->nullable();
            $table->string('transaction_id')->nullable();

            $table->string('metode_bayar')->nullable();
            $table->string('payment_type')->nullable();

            $table->integer('total');

            $table->enum('status', [
                'pending',
                'settlement',
                'capture',
                'expire',
                'cancel',
                'deny',
                'failure'
            ])->default('pending');

            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};