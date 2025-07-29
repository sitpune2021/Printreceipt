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
        Schema::create('printer_management', function (Blueprint $table) {
            $table->id();
            $table->string('mac_address')->unique();
            $table->string('model');
            $table->string('display_name');
          $table->string('registered_by');  
            $table->date('registration_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printer_management');
    }
};
