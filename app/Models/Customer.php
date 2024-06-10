<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
    ];


    protected $table = 'customers'; // Nama tabel yang berkaitan

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
