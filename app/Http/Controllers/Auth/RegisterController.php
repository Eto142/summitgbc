<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
 use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }



public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'required|string|max:255',
        'dob' => 'required|string|max:255',
        'account_type' => 'required|string|max:255',
        'transaction_pin' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Generate a unique account number
    do {
        $accountNumber = 'ACCT-' . mt_rand(1000000000, 9999999999);
    } while (User::where('account_number', $accountNumber)->exists());

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'dob' => $request->dob,
        'country' => $request->country,
        'account_type' => $request->account_type,
        'transaction_pin' => $request->transaction_pin,
        'password' => Hash::make($request->password),
        'account_number' => $accountNumber,
    ]);

    // Send welcome email
    Mail::to($user->email)->send(new WelcomeMail($user));

    auth()->login($user);

    return redirect('login')->with('success', 'Registration successful! Please check your email for account details.');
}

}

