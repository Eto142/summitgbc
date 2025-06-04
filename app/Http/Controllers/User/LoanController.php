<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
     public function index()
    {
        return view('user.loan.index');
    }


    public function RequestLoan(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'loan_reason' => 'nullable|string',
    ]);

    // Attach additional info
    $validated['user_id'] = $user->id;

    // Generate a random transaction ID
    $ref = rand(12344994, 76503737); // Make sure min is less than max
    $validated['transaction_id'] = $ref;
    $validated['status'] = 0; // pending status

    // Create the transfer
    $transfer = Loan::create($validated);

    // Create the transaction record
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = "LN" . $ref;
    $transaction->transaction_type = "Credit";
    $transaction->debit = 0;
    $transaction->credit = $validated['amount'];
    $transaction->transaction = "Loan";
    $transaction->transaction_amount = $validated['amount'];
    $transaction->transaction_description = "Loan Request of " . $validated['amount'];
    $transaction->transaction_status = 0; // pending
    $transaction->save();

     return redirect()->back()->with('success', 'Loan request submitted successfully and is pending approval.');
}

}
