<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{

    protected $fillable = [
        'product_id',
        'user_id',
        'comment',
        'rate',
    ];

    use HasFactory;
}
