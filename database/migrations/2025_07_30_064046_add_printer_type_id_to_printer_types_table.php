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
        Schema::table('printer_types', function (Blueprint $table) {
            $table->string('printer_type_id')->unique()->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('printer_types', function (Blueprint $table) {
            $table->dropColumn('printer_type_id');
        });
    }
};
