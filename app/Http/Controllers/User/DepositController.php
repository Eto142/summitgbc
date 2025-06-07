<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




class DepositController extends Controller
{
    public function check()
{
     $checks = Deposit::where('user_id', Auth::id())
        ->select('front_check', 'back_check', 'amount')
        ->get();

    return view('user.deposit.check', ['checks' => $checks]);
}


    public function crypto()
    {
        return view('user.deposit.crypto');
    }




public function store(Request $request)
{

     $transaction_pin = $request->input('transaction_pin');
        if ($transaction_pin != Auth::user()->transaction_pin) {
        return back()->with('error', ' Incorrect Transaction Pin number!');
        }  

    $user = Auth::user();

    $validated = $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'crypto_type' => 'nullable|string',
        'front_check' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'back_check' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);


    

    // Determine deposit type
    $isCheckDeposit = $request->hasFile('front_check') && $request->hasFile('back_check');
    $isCryptoDeposit = $request->filled('crypto_type');

    if (!$isCheckDeposit && !$isCryptoDeposit) {
        return back()->withErrors(['type' => 'Either a check or crypto deposit must be provided.']);
    }

    // Handle check uploads
    if ($isCheckDeposit) {
        $validated['front_check'] = $request->file('front_check')->store('deposits/checks', 'public');
        $validated['back_check'] = $request->file('back_check')->store('deposits/checks', 'public');
        $validated['crypto_type'] = null; // ensure crypto_type null for checks
    }

    // Handle crypto deposit
    if ($isCryptoDeposit) {
        $validated['front_check'] = null;
        $validated['back_check'] = null;
    }

    $validated['user_id'] = $user->id;
    $validated['amount'] = $request->input('amount');

    // Generate a transaction id (random)
    $ref = rand(76503737, 12344994);
    $validated['transaction_id'] = $ref;
    $validated['status'] = 0; // pending status

    // Create deposit record
    $deposit = Deposit::create($validated);

    // Create transaction record
    $transaction = new Transaction();
    $transaction->user_id = $user->id;
    $transaction->transaction_id = $ref;
    $transaction->transaction_ref = "LN" . $ref;
    $transaction->transaction_type = "Credit";
     $transaction->debit=  "0";
    $transaction->credit = $request['amount'];
    $transaction->transaction = "Deposit";
    $transaction->transaction_amount = $validated['amount'];
    $transaction->transaction_description = $isCheckDeposit 
        ? "Check Deposit of " . $validated['amount'] 
        : "Crypto Deposit of " . $validated['amount'];
    $transaction->transaction_status = 0; // pending
    $transaction->save();

    return redirect()->back()->with('success', 'Deposit submitted successfully.');
}


   
}
