<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\LoanController;
use App\Http\Controllers\User\CardController;
use App\Http\Controllers\User\TransferController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\User\BillController;

Route::get('/', function () {
    return view('home.home');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/news', function () {
    return view('home.news');
});

Route::get('/banking', function () {
    return view('home.banking');
});

Route::get('/contact', function () {
    return view('home.contact');
});

Route::get('/investment', function () {
    return view('home.investment');
});





// Login and registration routes (only accessible to guests)
// Route::middleware('guest')->group(function () {
//     Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login.page');
//     Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

//     Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');
// });


// Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');




// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');


// Logout Route
Route::post('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('user.logout');




Route::prefix('user')->as('user.')->middleware('auth')->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home'); // becomes 'user.home'
    Route::get('/alltransactions', [DashboardController::class, 'Alltransactions'])->name('transactions'); // becomes 'user.transactions'
    Route::get('/alert', [DashboardController::class, 'Alert'])->name('alert'); // becomes 'user.alert'
    Route::get('/setting', [DashboardController::class, 'Setting'])->name('setting'); // becomes 'user.setting'
    Route::get('/help', [DashboardController::class, 'Help'])->name('help'); // becomes 'user.help'
    Route::post('/update-setting', [DashboardController::class, 'updateSettings'])->name('settings');

    // Cards
    Route::prefix('cards')->name('cards.')->group(function () {
        Route::get('/', [CardController::class, 'index'])->name('index');
        Route::get('/add', [CardController::class, 'create'])->name('create');
        Route::get('/{card}', [CardController::class, 'show'])->name('show');
    });
    
    // Loans
    Route::prefix('loans')->name('loans.')->group(function () {
        Route::get('/', [LoanController::class, 'index'])->name('index');
          Route::post('/create', [LoanController::class, 'RequestLoan'])->name('create');
    });
    
    
    // Check Deposit
    Route::prefix('deposit')->name('deposit.')->group(function () {
        Route::get('/check', [DepositController::class, 'check'])->name('check');
        Route::get('/crypto', [DepositController::class, 'crypto'])->name('crypto');
         Route::post('/store', [DepositController::class, 'store'])->name('store');
    });

  Route::prefix('transfer')->name('transfer.')->group(function () {
     Route::get('/index', [TransferController::class, 'Transfer'])->name('index'); // becomes 'user.transfer'
     Route::post('/create', [TransferController::class, 'UserTransfer'])->name('create');
    
});

 Route::prefix('transaction')->name('transaction.')->group(function () {
     Route::get('/index', [TransactionController::class, 'index'])->name('index'); // becomes 'user.transfer'
       
});
  


  Route::prefix('bill')->name('bill.')->group(function () {
  Route::get('/index', [BillController::class, 'Bills'])->name('index'); // becomes 'user.bills'
    }); 
    
    
   
    });




