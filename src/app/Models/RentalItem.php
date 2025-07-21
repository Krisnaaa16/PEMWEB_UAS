<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentalItem extends Model
{
    protected $fillable = [
        'rental_id',
        'hiking_equipment_id',
        'quantity',
        'price_per_day',
        'subtotal',
        'condition_notes',
        'return_condition_notes',
        'return_condition',
    ];

    protected $casts = [
        'price_per_day' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    public function rental(): BelongsTo
    {
        return $this->belongsTo(Rental::class);
    }

    public function hikingEquipment(): BelongsTo
    {
        return $this->belongsTo(HikingEquipment::class);
    }

    public function getTotalAmountAttribute(): float
    {
        return $this->subtotal * $this->rental->duration;
    }
}
