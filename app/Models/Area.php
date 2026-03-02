<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

final class Area extends Model
{
    protected $fillable = [
        'name',
    ];

    public function pharmacies(): HasMany
    {
        return $this->hasMany(Pharmacy::class);
    }
}
