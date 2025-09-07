<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Ensure user_id matches users.id type and add FK using raw SQL (avoids doctrine/dbal)
        // MySQL syntax; for other drivers adjust accordingly
        DB::statement('ALTER TABLE `instruktur__profiles` MODIFY `user_id` INT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE `instruktur__profiles` ADD CONSTRAINT `instruktur__profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop FK then revert column type (keeping it as unsigned int per original schema)
        DB::statement('ALTER TABLE `instruktur__profiles` DROP FOREIGN KEY `instruktur__profiles_user_id_foreign`');
        DB::statement('ALTER TABLE `instruktur__profiles` MODIFY `user_id` INT UNSIGNED NOT NULL');
    }
};
