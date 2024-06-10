<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'image_url',
        'description',
        'price',
        'stock',
        'qty',
        'total_rating',
    ];

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }
    use HasFactory;
}
