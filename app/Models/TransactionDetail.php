<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details'; // Nama tabel yang berkaitan
    protected $fillable = [
        'user_id',
        'total_price',
        'pembayaran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function product_transaction_detail()
    {
        return $this->hasMany(ProductTransactionDetail::class);
    }
    use HasFactory;
}
