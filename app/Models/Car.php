<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'image',
        'price',
        'fuel_image',
        'fuel_type',
        'gearbox_image',
        'gearbox_type',
        'paint_image',
        'paint_type',
    ];
}
