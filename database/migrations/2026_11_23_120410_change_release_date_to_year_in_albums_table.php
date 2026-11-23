
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE albums MODIFY release_date YEAR NOT NULL');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE albums MODIFY release_date DATE NOT NULL');
    }
};
