<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'birth_date',
        'id_number',
        'emergency_contact_name',
        'emergency_contact_phone',
        'status',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }

    public function activeRentals(): HasMany
    {
        return $this->hasMany(Rental::class)->whereIn('status', ['confirmed', 'active']);
    }

    public function getAgeAttribute(): ?int
    {
        return $this->birth_date ? $this->birth_date->age : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
