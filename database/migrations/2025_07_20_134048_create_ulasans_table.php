<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ulasans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kursus');
            $table->unsignedBigInteger('id_user');
            $table->tinyInteger('rating'); // kolom rating 1–5
            $table->text('ulasan')->nullable();
            $table->timestamps();

            $table->foreign('id_kursus')->references('id')->on('kursuses')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};

