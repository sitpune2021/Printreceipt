<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   public function up(): void
{
    Schema::table('printer_settings', function (Blueprint $table) {
        $table->foreign('printer_type_id')
              ->references('id')
              ->on('printer_types')
              ->onDelete('cascade');
    });
}


    public function down(): void
    {
        Schema::table('printer_settings', function (Blueprint $table) {
            $table->dropForeign(['printer_type_id']);
            $table->dropColumn('printer_type_id');
        });
    }
};

