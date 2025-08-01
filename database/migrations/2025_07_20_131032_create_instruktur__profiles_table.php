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
        Schema::create('instruktur__profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('keahlian',250);
            $table->text('pengalaman');
            $table->text('bio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instruktur__profiles');
    }
};
