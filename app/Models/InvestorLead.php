<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorLead extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'business_email',
        'organisation',
        'investor_profile',
        'indicative_interest',
        'sector_interest',
        'consent',
        'status',
        'reviewer_notes',
        'ip_address',
    ];

    protected $casts = [
        'consent' => 'boolean',
    ];
}
