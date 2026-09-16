<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestorDocument extends Model
{
    protected $fillable = [
        'user_id',
        'investor_application_id',
        'document_type',
        'original_name',
        'disk_path',
        'mime_type',
        'size_bytes',
        'status',
        'rejection_reason',
        'expires_at',
        'reviewed_at',
        'reviewed_by',
    ];

    protected $casts = [
        'expires_at' => 'date',
        'reviewed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(InvestorApplication::class, 'investor_application_id');
    }

    public function reviewedBy()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
