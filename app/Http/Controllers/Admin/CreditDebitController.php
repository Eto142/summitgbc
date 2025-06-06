<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TransactionNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Credit;
use App\Models\Debit;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreditDebitController extends Controller
{
    //






// public function creditdebitUser(Request $request)
// {
//     $validated = $request->validate([
//         'id' => 'required|integer',
//         'amount' => 'required|numeric|min:0',
//         'type' => 'required|in:credit,debit',
//         'description' => 'nullable|string',
//         'name' => 'required|string',
//         'email' => 'required|email',
//         'balance' => 'required|numeric',
//         'a_number' => 'required|string',
//         'currency' => 'required|string',
//     ]);

//     $ref = rand(10000000, 99999999);
//     $date = Carbon::now();
//     $amount = $request->amount;
//     $transactionType = ucfirst($request->type); // "Credit" or "Debit"

//     // Save to Credit or Debit model
//     if ($request->type === 'credit') {
//         $record = new \App\Models\Credit();
//         $newBalance = $request->balance + $amount;
//     } else {
//         $record = new \App\Models\Debit();
//         $newBalance = $request->balance - $amount;
//     }

//     $record->user_id = $request->id;
//     $record->amount = $amount;
//     $record->description = $request->description ?? '';
//     $record->status = 1;
//     $record->save();

//     // Save transaction
//     $transaction = new \App\Models\Transaction();
//     $transaction->user_id = $request->id;
//     $transaction->transaction_id = $record->id;
//     $transaction->transaction_ref = "CD" . $ref;
//     $transaction->transaction_type = $transactionType;
//     $transaction->transaction = $transactionType;
//     $transaction->transaction_amount = $amount;
//     $transaction->transaction_description = $transactionType . ' transaction';
//     $transaction->transaction_status = 1;
//     $transaction->save();

//     // Prepare data for email
//     $mailData = [
//         'type' => $transactionType,
//         'name' => $request->name,
//         'amount' => $amount,
//         'balance' => $newBalance,
//         'date' => $date->format('Y-m-d H:i:s'),
//         'a_number' => $request->a_number,
//         'currency' => $request->currency,
//         'description' => $request->description ?? '',
//     ];

//     // Send email notification
//     Mail::to($request->email)->send(new TransactionNotification($mailData));

//     return back()->with('success', "{$transactionType} successful and notification sent.");
// }


public function creditUser(Request $request)
{
    
    $ref = rand(76503737, 12344994);
    $credit = new Credit;
    $credit->user_id = $request['id'];
    $credit->amount =  $request['amount'];
    $credit->description =  $request['description'];
    $credit->status = 1;
    $credit->save();

    $transaction = new Transaction;
    $transaction->user_id = $request['id'];
    $transaction->transaction_id = $credit->id;
    $ref = $transaction->transaction_ref = "CD".$ref;
    $transaction->transaction_type = "Credit";
    $transaction->transaction = "Credit";
    $transaction->transaction_amount = $request['amount'];
    $transaction->transaction_description = "Credit transaction";
    $transaction->transaction_status = 1;
    $transaction->save();

    $full_name = $request['name'];  
    $email =  $request['email'];
    $amount = $request->input('amount');
    $date = Carbon::now();  
    $balance =  $request['balance'] + $request['amount'];
    $description =  $request['description'];
    $a_number =  $request['a_number'];
    $currency =  $request['currency'];
      
    $user = [

      'account_number' => $a_number,
      'account_name' => $full_name,
      'full_name' => $full_name,
      'description' => $description,
      'amount' => $amount,
      'date' => $date,
      'balance' => $balance,
      'currency' => $currency,
      'ref' => $ref,
     ];
    
    // Mail::to($email)->send(new CreditEmail ($user));

    

    return back()->with('status', 'User account credit successfully');
}


public function debitUser(Request $request)
{
    


   
    $ref = rand(76503737, 12344994);
    $debit = new Debit;
    $debit->user_id = $request['id'];
    $debit->amount =  $request['amount'];
    $debit->description =  $request['description'];
    $debit->status = 1;
    $debit->save();

    $transaction = new Transaction;
    $transaction->user_id = $request['id'];
    $transaction->transaction_id = $debit->id;
    $ref = $transaction->transaction_ref = "DB".$ref;
    $transaction->transaction_type = "Debit";
    $transaction->transaction = "Debit";
    $transaction->transaction_amount = $request['amount'];
    $transaction->transaction_description = "Debit Transaction";
    $transaction->transaction_status = 1;
    $transaction->save();



    $full_name = $request['name'];  
    $email =  $request['email'];
    $amount = $request->input('amount');
    $date = Carbon::now();  
    $balance =  $request['balance'] - $request['amount'];
    $description =  $request['description'];
    $a_number =  $request['a_number'];
    $currency =  $request['currency'];
      
    $user = [

      'account_number' => $a_number,
      'account_name' => $full_name,
      'full_name' => $full_name,
      'description' => $description,
      'amount' => $amount,
      'date' => $date,
      'balance' => $balance,
      'currency' => $currency,
      'ref' => $ref,
     ];
    
    // Mail::to($email)->send(new DebitEmail ($user));

    return back()->with('status', 'User account debit successfully');
}

}
