<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


final class Duty extends Model
{
    protected $fillable = [
        'pharmacy_id',
        'starts_at',
        'ends_at',
        'duty_type',
        'created_by',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
    ];

    /* ================= Relations ================= */

    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /* ================= Scopes ================= */

    public function scopeActive(Builder $query, Carbon $now): Builder
    {
        return $query
            ->where('starts_at', '<=', $now)
            ->where('ends_at', '>=', $now);
    }

}
