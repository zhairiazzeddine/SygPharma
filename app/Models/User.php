<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


final class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'pharmacy_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /* ================= Relations ================= */

    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class);
    }

    /* ================= Role helpers ================= */

    public function isAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isPharmacist(): bool
    {
        return $this->role === 'pharmacist';
    }
    
}
