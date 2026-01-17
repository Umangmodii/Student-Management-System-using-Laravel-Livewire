<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('students')) {
            DB::statement("ALTER TABLE students MODIFY phone VARCHAR(20) NULL"); // Modify the data type change integer into varchar
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('students')) {
            DB::statement("ALTER TABLE students MODIFY phone INT(11) NULL");
        }
    }
};
