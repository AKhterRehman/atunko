<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'actor_id',
        'action',
        'subject_type',
        'subject_id',
        'meta',
        'ip_address',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function actor()
    {
        return $this->belongsTo(User::class, 'actor_id');
    }

    public static function record(string $action, ?Model $subject = null, array $meta = []): self
    {
        return self::create([
            'actor_id' => auth()->id(),
            'action' => $action,
            'subject_type' => $subject ? $subject->getMorphClass() : null,
            'subject_id' => $subject?->getKey(),
            'meta' => $meta,
            'ip_address' => request()?->ip(),
        ]);
    }
}
