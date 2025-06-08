<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Transaction;
use App\Models\Transfer;
use App\Models\Credit;
use App\Models\Debit;
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

// public function UserTransfer(Request $request)
// {

    
//      $transaction_pin = $request->input('transaction_pin');
//         if ($transaction_pin != Auth::user()->transaction_pin) {
//         return back()->with('error', ' Incorrect Transaction Pin number!');
//         }  
        
//     $user = Auth::user();

//     $validated = $request->validate([
//         'amount' => 'required|numeric|min:0.01',
//         'account_number' => 'nullable|string',
//         'bank_name' => 'nullable|string',
//         'beneficiary_name' => 'nullable|string',
//         'bank_address' => 'nullable|string',
//         'routing' => 'nullable|string',
//         'payment_purpose' => 'nullable|string',
//         'swift_code' => 'nullable|string',
//     ]);

//     // Attach additional info
//     $validated['user_id'] = $user->id;

//     // Generate a random transaction ID
//     $ref = rand(12344994, 76503737); // Make sure min is less than max
//     $validated['transaction_id'] = $ref;
//     $validated['status'] = 0; // pending status

//     // Create the transfer
//     $transfer = Transfer::create($validated);

//     // Create the transaction record
//     $transaction = new Transaction();
//     $transaction->user_id = $user->id;
//     $transaction->transaction_id = $ref;
//     $transaction->transaction_ref = "LN" . $ref;
//     $transaction->transaction_type = "Debit";
//     $transaction->credit = 0;
//     $transaction->debit = $validated['amount'];
//     $transaction->transaction = "Transfer";
//     $transaction->transaction_amount = $validated['amount'];
//     $transaction->transaction_description = "Bank Transfer of " . $validated['amount'];
//     $transaction->transaction_status = 0; // pending
//     $transaction->save();

//     $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
//     $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
//     $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
//     $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
//     // $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
//      $data['user_transfer']= Transfer::where('user_id',Auth::user()->id)->sum('amount');
//     $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
//     $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
//     $data['balance'] = $data['credit_transfers'] - $data['debit_transfers'];
      

//      return redirect()->back()->with('success', 'Transfer request submitted successfully and is pending approval.');
// }




public function UserTransfer(Request $request)
{
    // First verify transaction pin
    $transaction_pin = $request->input('transaction_pin');
    if ($transaction_pin != Auth::user()->transaction_pin) {
        return back()->with('error', 'Incorrect Transaction Pin number!');
    }

    $user = Auth::user();

    // Calculate user balance
    $credit_transfers = Transaction::where('user_id', $user->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Credit')
        ->sum('transaction_amount');
    
    $debit_transfers = Transaction::where('user_id', $user->id)
        ->where('transaction_status', '1')
        ->where('transaction_type', 'Debit')
        ->sum('transaction_amount');
    
    $balance = $credit_transfers - $debit_transfers;

    // Manual balance check before validation
    if ($request->amount > $balance) {
        return back()->with('error', 'Insufficient balance for this transfer!');
    }

    // Validate other fields
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

    // Generate a random transaction ID
    $ref = rand(12344994, 76503737);
    
    // Create the transfer
    $transfer = Transfer::create([
        'user_id' => $user->id,
        'transaction_id' => $ref,
        'status' => 0,
        'amount' => $validated['amount'],
        'account_number' => $validated['account_number'] ?? null,
        'bank_name' => $validated['bank_name'] ?? null,
        'beneficiary_name' => $validated['beneficiary_name'] ?? null,
        'bank_address' => $validated['bank_address'] ?? null,
        'routing' => $validated['routing'] ?? null,
        'payment_purpose' => $validated['payment_purpose'] ?? null,
        'swift_code' => $validated['swift_code'] ?? null,
    ]);

    // Create the transaction record
    Transaction::create([
        'user_id' => $user->id,
        'transaction_id' => $ref,
        'transaction_ref' => "LN" . $ref,
        'transaction_type' => "Debit",
        'credit' => 0,
        'debit' => $validated['amount'],
        'transaction' => "Transfer",
        'transaction_amount' => $validated['amount'],
        'transaction_description' => "Bank Transfer of " . $validated['amount'],
        'transaction_status' => 0,
    ]);

    return redirect()->back()->with('success', 'Transfer request submitted successfully and is pending approval.');
}
 


}