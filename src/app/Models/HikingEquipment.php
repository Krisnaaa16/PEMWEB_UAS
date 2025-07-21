<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class HikingEquipment extends Model
{
    protected $table = 'hiking_equipments';
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'price_per_day',
        'stock_total',
        'stock_available',
        'brand',
        'condition',
        'specifications',
        'images',
        'size',
        'weight',
        'rental_terms',
        'is_featured',
        'is_active',
        'security_deposit',
        'min_rental_days',
        'max_rental_days',
    ];

    protected $casts = [
        'specifications' => 'array',
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'price_per_day' => 'decimal:2',
        'security_deposit' => 'decimal:2',
        'weight' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($equipment) {
            if (empty($equipment->slug)) {
                $equipment->slug = Str::slug($equipment->name);
            }
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function rentalItems(): HasMany
    {
        return $this->hasMany(RentalItem::class);
    }

    public function getMainImageAttribute(): ?string
    {
        $images = $this->images ?? [];
        return count($images) > 0 ? $images[0] : null;
    }

    public function isAvailable(int $quantity = 1): bool
    {
        return $this->stock_available >= $quantity && $this->is_active;
    }

    public function getTotalRentedAttribute(): int
    {
        return $this->stock_total - $this->stock_available;
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('stock_available', '>', 0);
    }
}
