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
            $table->enum('role', ['investor', 'reviewer', 'compliance', 'admin'])->default('investor')->after('email');
            $table->enum('account_status', ['active', 'suspended', 'closed'])->default('active')->after('role');
            $table->string('phone')->nullable()->after('account_status');
            $table->timestamp('last_login_at')->nullable()->after('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'account_status', 'phone', 'last_login_at']);
        });
    }
};
