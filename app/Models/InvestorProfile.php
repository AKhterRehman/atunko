<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorProfile extends Model
{
    protected $fillable = [
        'user_id',
        'investor_type',
        'first_name',
        'last_name',
        'organisation_name',
        'registration_number',
        'country',
        'address_line_1',
        'address_line_2',
        'city',
        'postal_code',
        'nationality',
        'date_of_birth',
        'source_of_funds',
        'eligibility_confirmed',
        'profile_completed_at',
    ];

    protected $casts = [
        'date_of_birth' => 'encrypted',
        'source_of_funds' => 'encrypted',
        'address_line_1' => 'encrypted',
        'address_line_2' => 'encrypted',
        'registration_number' => 'encrypted',
        'eligibility_confirmed' => 'boolean',
        'profile_completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
