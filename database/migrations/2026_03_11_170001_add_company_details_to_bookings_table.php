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
        // First Modify the enum to add checked_in status 
        // Doctrine cannot modify enums nicely, so we might need a workaround or handle this via raw SQL if enum change fails. 
        // A common Laravel workaround is to drop and recreate or use string. We'll add new columns first.
        
        Schema::table('bookings', function (Blueprint $table) {
            $table->enum('booking_type', ['individual', 'company'])->default('individual')->after('user_id');
            $table->string('company_name')->nullable()->after('booking_type');
        });
        
        // Use raw query to modify enum since Doctrine DBAL struggles with it
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'confirmed', 'checked_in', 'cancelled', 'completed') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('booking_type');
            $table->dropColumn('company_name');
        });
        
        \Illuminate\Support\Facades\DB::statement("ALTER TABLE bookings MODIFY COLUMN status ENUM('pending', 'confirmed', 'cancelled', 'completed') DEFAULT 'pending'");
    }
};
