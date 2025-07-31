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
        Schema::create('printer_settings', function (Blueprint $table) {
            $table->id();
            $table->string('margin_top')->nullable();
            $table->string('margin_bottom')->nullable();
            $table->string('margin_left')->nullable();
            $table->string('margin_right')->nullable();
            $table->string('font_size')->nullable();
            $table->string('line_spacing')->nullable();
            $table->string('alignment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printer_settings');
    }
};
