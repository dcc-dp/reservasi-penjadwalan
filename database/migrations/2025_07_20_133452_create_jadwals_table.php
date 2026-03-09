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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservasi_id');
            $table->date('tanggal');
            $table->string('hari');
            $table->time('jam');
            $table->string('pertemuan');
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
        Schema::dropIfExists('jadwals');
    }
};
