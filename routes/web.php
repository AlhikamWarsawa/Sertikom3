<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return view('admin_dashboard');
    } else {
        return view('member_dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('loans', LoanController::class);
    Route::get('/loans/pinjam', [LoanController::class, 'pinjam'])->name('loans.pinjam');
    Route::get('/kembali', [LoanController::class, 'kembali'])->name('loans.kembali');
Route::put('/loans/{id}/return', [LoanController::class, 'returnBook'])->name('loans.returnBook');
Route::delete('/loans/{loan}', [LoanController::class, 'destroy'])->name('loans.destroy');
//}

require __DIR__.'/auth.php';
