<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $columns = [
        'date_of_birth',
        'source_of_funds',
        'address_line_1',
        'address_line_2',
        'registration_number',
    ];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('investor_profiles', function (Blueprint $table) {
            $table->text('date_of_birth')->nullable()->change();
            $table->text('source_of_funds')->nullable()->change();
            $table->text('address_line_1')->nullable()->change();
            $table->text('address_line_2')->nullable()->change();
            $table->text('registration_number')->nullable()->change();
        });

        foreach (DB::table('investor_profiles')->get() as $profile) {
            $values = [];
            foreach ($this->columns as $column) {
                if ($profile->{$column} !== null) {
                    $values[$column] = Crypt::encryptString($profile->{$column});
                }
            }
            if ($values) {
                DB::table('investor_profiles')->where('id', $profile->id)->update($values);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        foreach (DB::table('investor_profiles')->get() as $profile) {
            $values = [];
            foreach ($this->columns as $column) {
                if ($profile->{$column} !== null) {
                    try {
                        $values[$column] = Crypt::decryptString($profile->{$column});
                    } catch (\Throwable) {
                        // leave as-is if it was never encrypted
                    }
                }
            }
            if ($values) {
                DB::table('investor_profiles')->where('id', $profile->id)->update($values);
            }
        }

        Schema::table('investor_profiles', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable()->change();
            $table->string('source_of_funds')->nullable()->change();
            $table->string('address_line_1')->nullable()->change();
            $table->string('address_line_2')->nullable()->change();
            $table->string('registration_number')->nullable()->change();
        });
    }
};
