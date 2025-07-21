<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Rental extends Model
{
    protected $fillable = [
        'rental_code',
        'customer_id',
        'user_id',
        'start_date',
        'end_date',
        'actual_return_date',
        'total_amount',
        'security_deposit',
        'late_fee',
        'damage_fee',
        'status',
        'notes',
        'return_notes',
        'pickup_photos',
        'return_photos',
        'confirmed_at',
        'picked_up_at',
        'returned_at',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'actual_return_date' => 'date',
        'total_amount' => 'decimal:2',
        'security_deposit' => 'decimal:2',
        'late_fee' => 'decimal:2',
        'damage_fee' => 'decimal:2',
        'pickup_photos' => 'array',
        'return_photos' => 'array',
        'confirmed_at' => 'datetime',
        'picked_up_at' => 'datetime',
        'returned_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($rental) {
            if (empty($rental->rental_code)) {
                $rental->rental_code = 'RNT-' . date('Ymd') . '-' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function rentalItems(): HasMany
    {
        return $this->hasMany(RentalItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function getDurationAttribute(): int
    {
        return $this->start_date->diffInDays($this->end_date) + 1;
    }

    public function getDaysLateAttribute(): int
    {
        if (!$this->actual_return_date || $this->actual_return_date <= $this->end_date) {
            return 0;
        }
        
        return $this->end_date->diffInDays($this->actual_return_date);
    }

    public function isOverdue(): bool
    {
        return $this->status === 'active' && Carbon::now()->gt($this->end_date);
    }

    public function getTotalPaidAttribute(): float
    {
        return $this->payments()->where('status', 'completed')->sum('amount');
    }

    public function getRemainingAmountAttribute(): float
    {
        return $this->total_amount - $this->total_paid;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', 'active')
                    ->where('end_date', '<', Carbon::now());
    }
}
