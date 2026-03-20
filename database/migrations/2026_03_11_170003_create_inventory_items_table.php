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
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('quantity')->default(0);
            $table->string('unit')->nullable(); // e.g., kg, liters, pieces
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->foreignId('department_id')->nullable()->constrained('users')->onDelete('set null'); // Linking to user or generic dept
            $table->string('department')->default('kitchen'); // e.g., kitchen, housekeeping
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_items');
    }
};
