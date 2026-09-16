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
        Schema::create('kyc_checks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('investor_application_id')->constrained()->cascadeOnDelete();
            $table->enum('check_type', ['identity_verification', 'sanctions_pep_screening', 'address_verification', 'beneficial_owner_check']);
            $table->enum('status', ['pending', 'passed', 'failed', 'exception'])->default('pending');
            $table->string('provider')->nullable();
            $table->string('provider_reference')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('checked_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('checked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_checks');
    }
};
