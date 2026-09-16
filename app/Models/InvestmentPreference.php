<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentPreference extends Model
{
    protected $fillable = [
        'user_id',
        'indicative_interest',
        'sectors_of_interest',
        'projects_of_interest',
        'risk_acknowledged',
    ];

    protected $casts = [
        'sectors_of_interest' => 'array',
        'risk_acknowledged' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
