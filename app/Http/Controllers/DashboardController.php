<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Debit;
use App\Models\Deposit;
use App\Models\Loan;
use App\Models\Transaction; // Make sure you have this model
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
     // Optional: require authentication
  

    //display user dashboard
   public function index() {
    // Get the currently authenticated user
    $user = auth()->user();

    // Fetch only the latest 5 transactions for this user
    $RecentTransactions = Transaction::where('user_id', $user->id)->latest()->take(5)->get();

    $RecentActivity = Transaction::where('user_id', $user->id)->latest()->take(4)->get();

    // Load the dashboard view
     $data['credit_transfers']= Transaction::where('user_id',Auth::user()->id)->where('transaction_status','1')->where('transaction_type', 'Credit') ->sum('transaction_amount');
    $data['debit_transfers'] = Transaction::where('user_id', Auth::user()->id)->where('transaction_status', '1') ->where('transaction_type', 'Debit')  ->sum('transaction_amount');// Include only debit transactions->sum('transaction_amount');
    $data['user_deposits']= Deposit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['user_loans']= Loan::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    // $data['user_card']= Card::where('user_id',Auth::user()->id)->sum('amount');
     $data['user_transfer']= Transfer::where('user_id',Auth::user()->id)->sum('amount');
    $data['user_credit']= Credit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['user_debit']= Debit::where('user_id',Auth::user()->id)->where('status','1')->sum('amount');
    $data['balance'] = $data['credit_transfers'] - $data['debit_transfers'];
       
    return view('user.home', array_merge(compact('RecentTransactions', 'RecentActivity'), $data));

}

     public function Alltransactions()
    {
        return view('user.transactions'); // Load the dashboard view
    }

     public function Bills()
    {
        return view('user.bills'); // Load the dashboard view
    }

    public function Alert()
    {
        return view('user.alert'); // Load the dashboard alert
    }

    public function Help()
    {
        return view('user.help'); // Load the dashboard help
    }

    public function Setting()
    {
        return view('user.setting'); // Load the dashboard view
    }

   public function updateSettings(Request $request){
    $request->validate([
   'name' => 'string|max:255',
   'kin' => 'string|max:255',
   'email' => 'string|unique:users,email' .auth()->id,
   'country' => 'string|max:255',
   'address' => 'string|max:255',
   'phone' => 'phone',
    ]);

   $user = auth()->user;
   $user->name = $request->input('name');
   $user->kin = $request->input('kin');
   $user->email = $request->input('email');
   $user->country = $request->input('country');
   $user->address = $request->input('address');
   $user->phone = $request->input('phone');
   $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
}






   


}
