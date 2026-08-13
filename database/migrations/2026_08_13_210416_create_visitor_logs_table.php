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
    Schema::create('visitor_logs', function (Blueprint $table) {
        $table->id('log_id');
        $table->string('visitor_name');
        $table->string('phone');
        $table->string('flat_number');
        $table->string('purpose'); // Delivery, Guest, Service
        $table->timestamp('entry_time');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};
