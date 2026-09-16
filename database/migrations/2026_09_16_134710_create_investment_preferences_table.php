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
        Schema::create('investment_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->enum('indicative_interest', ['100k_500k', '500k_1m', '1m_5m', '5m_plus'])->nullable();
            $table->json('sectors_of_interest')->nullable();
            $table->text('projects_of_interest')->nullable();
            $table->boolean('risk_acknowledged')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investment_preferences');
    }
};
