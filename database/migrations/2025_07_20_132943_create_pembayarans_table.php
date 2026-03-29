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
        $table->unsignedBigInteger('reservasi_id');

        $table->string('metode_bayar',100)->nullable();
        $table->integer('total')->nullable();

        $table->enum('status', ['proses','selesai','gagal'])
            ->default('proses');

        $table->timestamps();

        $table->foreign('reservasi_id')
            ->references('id')
            ->on('reservasis')
            ->onDelete('cascade');
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
