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
        Schema::create('investor_leads', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('business_email');
            $table->string('organisation')->nullable();
            $table->enum('investor_profile', ['individual', 'family_office', 'institution', 'strategic_partner']);
            $table->enum('indicative_interest', ['100k_500k', '500k_1m', '1m_5m', '5m_plus']);
            $table->enum('sector_interest', ['sports_education', 'renewable_energy', 'real_estate', 'agriculture', 'fintech', 'multiple']);
            $table->boolean('consent')->default(false);
            $table->enum('status', ['new', 'contacted', 'qualified', 'rejected'])->default('new');
            $table->text('reviewer_notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();

            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investor_leads');
    }
};
