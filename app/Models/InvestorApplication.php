<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorApplication extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'current_step',
        'terms_consent',
        'privacy_consent',
        'consent_version',
        'assigned_reviewer_id',
        'reviewer_notes',
        'submitted_at',
        'decided_at',
    ];

    protected $casts = [
        'terms_consent' => 'boolean',
        'privacy_consent' => 'boolean',
        'submitted_at' => 'datetime',
        'decided_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignedReviewer()
    {
        return $this->belongsTo(User::class, 'assigned_reviewer_id');
    }

    public function documents()
    {
        return $this->hasMany(InvestorDocument::class);
    }
}
