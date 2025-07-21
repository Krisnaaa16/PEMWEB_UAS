<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
    ];
    
    // Model ini sudah digantikan dengan HikingEquipment
    // Tetap dipertahankan untuk backward compatibility
}
