<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


final class Pharmacy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'area_id',
        'name',
        'address',
        'phone',
        'latitude',
        'longitude',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude'  => 'float',
        'longitude' => 'float',
    ];

    /* ================= Relations ================= */

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function openingHours(): HasMany
    {
        return $this->hasMany(OpeningHour::class);
    }

    public function duties(): HasMany
    {
        return $this->hasMany(Duty::class);
    }

    public function pharmacists(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
