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
        Schema::table('users', function (Blueprint $table) {
            $table->string('emp_id')->nullable()->unique()->after('password');
            $table->integer('role_level')
                ->comment("1 as superadmin, 2 as admin, 3 as user")
                ->after('email_verified_at')
                ->default(3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_level', 'emp_id');
        });
    }
};
