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
            $table->unsignedInteger('id_user');
            $table->unsignedInteger('id_kursus');
            $table->date('tanggal');
            $table->dateTime('hari');
            $table->dateTime('jam');
            $table->string('ruangan');
            $table->string('pertemuan');
            $table->timestamps();
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
