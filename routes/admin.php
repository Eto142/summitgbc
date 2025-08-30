<?php 


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CreditDebitController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\TransferController;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\Transfer;
use Illuminate\Support\Facades\Route;









// Admin Auth Routes
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

// Protected admin routes (example)
Route::middleware('auth:admin')->group(function () {

// Protecting admin routes using the 'admin' middleware
    // Route::middleware(['admin'])->group(function () { // Admin Profile Routes
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');


  Route::get('/users', [ManageUserController::class, 'ManageUsers'])->name('users'); // becomes 'admin.user'
  Route::get('/show', [ManageUserController::class, 'ShowUsers'])->name('show'); // becomes 'admin.user'
  Route::get('/profile/{id}/', [ManageUserController::class, 'userProfile'])->name('profile');
  Route::delete('/delete/{id}', [ManageUserController::class, 'deleteUser'])->name('delete');


  Route::prefix('admin/mail')->group(function() {
    Route::get('/compose/{user}', [MailController::class, 'compose'])->name('mail.compose');
    Route::post('/send', [MailController::class, 'send'])->name('users.send-mail');
    Route::get('/history', [MailController::class, 'history'])->name('admin.mail.history');
    
});

 Route::match(['get', 'post'], 'credit-user', [CreditDebitController::class, 'creditUser'])->name('credit.user');
 Route::match(['get', 'post'], 'debit-user', [CreditDebitController::class, 'debitUser'])->name('debit.user');


//DepositController 
   Route::post('/approve-deposit/{id}', [DepositController::class, 'ApproveDeposit'])->name('approve-deposit');
  Route::post('/decline-deposit/{id}', [DepositController::class, 'DeclineDeposit'])->name('decline-deposit');




  //transaction controller
   Route::get('user_transactions', [TransactionController::class, 'usersTransaction'])->name('transactions');


    //loan controller
   Route::get('user_loans', [LoanController::class, 'UsersLoans'])->name('loans');


    //Transfer controller
   Route::get('user_transfers', [TransferController::class, 'usersTransfer'])->name('transfers');
// TransferController
Route::post('/approve-transfer/{id}', [TransferController::class, 'approveTransfer'])->name('approve-transfer');
Route::post('/decline-transfer/{id}', [TransferController::class, 'declineTransfer'])->name('decline-transfer');


    //Deposit controller
   Route::get('user_deposits', [DepositController::class, 'usersDeposit'])->name('deposits');

});
