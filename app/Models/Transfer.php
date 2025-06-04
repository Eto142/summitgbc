<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'amount',
        'account_number',
         'beneficiary_name',
        'bank_name',
        'bank_address',
        'routing',
        'payment_purpose',
        'swift_code',
        'transaction_id',
        'status',
    ];

    // Relationship to User (if needed)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
