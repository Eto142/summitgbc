<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'transaction_id',
        'front_check',
        'back_check',
        'crypto_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
