<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KycCheck extends Model
{
    protected $fillable = [
        'investor_application_id',
        'check_type',
        'status',
        'provider',
        'provider_reference',
        'notes',
        'checked_by',
        'checked_at',
    ];

    protected $casts = [
        'checked_at' => 'datetime',
    ];

    public function application()
    {
        return $this->belongsTo(InvestorApplication::class, 'investor_application_id');
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }
}
