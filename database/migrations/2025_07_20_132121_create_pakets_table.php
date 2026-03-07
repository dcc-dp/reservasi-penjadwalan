<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kursus_id');
            $table->enum('jenis', ['Regular','VIP','VVIP']);
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('kursus_id')
                  ->references('id')
                  ->on('kursuses')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};