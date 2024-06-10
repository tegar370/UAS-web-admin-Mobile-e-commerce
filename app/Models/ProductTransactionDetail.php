<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransactionDetail extends Model
{

    protected $fillable = [
        'product_id',
        'transaction_detail_id',
        'qty',
        'total_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    use HasFactory;
}
