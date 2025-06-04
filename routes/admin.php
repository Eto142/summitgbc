<?php 


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\MailController;
use App\Http\Controllers\Admin\ManageUserController;
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


  Route::prefix('admin/mail')->group(function() {
    Route::get('/compose/{user}', [MailController::class, 'compose'])->name('mail.compose');
    Route::post('/send', [MailController::class, 'send'])->name('users.send-mail');
    Route::get('/history', [MailController::class, 'history'])->name('admin.mail.history');
    
});
});
