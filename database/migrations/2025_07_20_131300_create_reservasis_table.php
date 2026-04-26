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
            Schema::create('reservasis', function (Blueprint $table) {
        $table->id();

        $table->foreignId('id_user')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->foreignId('id_kursus')
            ->constrained('kursuses')
            ->cascadeOnDelete();

        $table->foreignId('id_paket')
            ->constrained('pakets')
            ->cascadeOnDelete();

        $table->string('ruangan')->nullable();

        $table->enum('status', [
            'pending',
            'aktif',
            'selesai',
            'batal'
        ])->default('pending');

        $table->timestamps();
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasis');
    }
};