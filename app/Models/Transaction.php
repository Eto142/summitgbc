<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Specify the table if it's not the plural of model name (optional)
    // protected $table = 'transactions';

    // Specify which fields are mass assignable
    protected $fillable = [
        'user_id',
        'transaction_id',
        'transaction_ref',
        'transaction_type',
        'transaction',
        'email',
        'credit',
        'debit',
        'wallet_address',
        'wallet_type',
        'transaction_amount',
        'transaction_description',
        'transaction_status',
        'account_name',
        'account_number',
        'account_type',
        'caccount_name',
        'caccount_number',
        'cbank_name',
        'bank_name',
        'routing_number',
        'card_number',
        'cvv',
        'cdate'
    ];

    // Define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
