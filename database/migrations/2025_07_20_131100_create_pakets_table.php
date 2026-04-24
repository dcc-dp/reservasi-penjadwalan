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
        $table->foreignId('kursus_id')
            ->constrained('kursuses')
            ->cascadeOnDelete();

        $table->enum('jenis', ['Regular', 'VIP', 'VVIP']);
        $table->integer('harga');
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }

    
};