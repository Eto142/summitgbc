<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{

    // Show recent transfers
public function Transfer()
{
    $user = Auth::user();

    // Fetch latest 5 transfers for the authenticated user
    $recentTransfers = Transfer::where('user_id', $user->id)
                        ->latest()
                        ->take(5)
                        ->get();

    return view('user.transfer.index', compact('recentTransfers'));
}



    //store bank transfer 

public function UserTransfer(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'account_number' => 'nullable|string',
        'bank_name' => 'nullable|string',
        'beneficiary_name' => 'nullable|string',
        'bank_address' => 'nullable|string',
        'routing' => 'nullable|string',
        'payment_purpose' => 'nullable|string',
        'swift_code' => 'nullable|string',
    ]);

    // Attach additional info
    $validated['user_id'] = $user->id;

    // Generate a random transaction ID
    $ref = rand(12344994, 76503737); // Make sure min is less than max
    $validated['transaction_id'] = $ref;
    $validated['status'] = 0; // pending status

    // Create the transfer
    $transfer = Transfer::create($validated);

    // Create the transaction record
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = "LN" . $ref;
    $transaction->transaction_type = "Debit";
    $transaction->credit = 0;
    $transaction->debit = $validated['amount'];
    $transaction->transaction = "Transfer";
    $transaction->transaction_amount = $validated['amount'];
    $transaction->transaction_description = "Bank Transfer of " . $validated['amount'];
    $transaction->transaction_status = 0; // pending
    $transaction->save();

     return redirect()->back()->with('success', 'Transfer request submitted successfully and is pending approval.');
}

}