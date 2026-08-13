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
    Schema::create('complaints', function (Blueprint $table) {
        $table->id('complaint_id');
        $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
        $table->string('title');
        $table->text('description');
        $table->string('category'); // e.g., Plumbing, Electrical, Maintenance
        $table->enum('status', ['Pending', 'In Progress', 'Resolved'])->default('Pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
