<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Only add if not already exists — these may have been added in a previous migration
            if (!Schema::hasColumn('users', 'preferred_room_type')) {
                $table->string('preferred_room_type')->nullable()->after('address');
            }
            if (!Schema::hasColumn('users', 'dietary_requirements')) {
                $table->string('dietary_requirements')->nullable()->after('preferred_room_type');
            }
            if (!Schema::hasColumn('users', 'emergency_contact_name')) {
                $table->string('emergency_contact_name')->nullable()->after('dietary_requirements');
            }
            if (!Schema::hasColumn('users', 'emergency_contact_phone')) {
                $table->string('emergency_contact_phone')->nullable()->after('emergency_contact_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'preferred_room_type',
                'dietary_requirements',
                'emergency_contact_name',
                'emergency_contact_phone',
            ]);
        });
    }
};
