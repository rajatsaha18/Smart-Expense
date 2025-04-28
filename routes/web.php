<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileUpdateController;


Route::get('/', function () {
    return redirect()->route('login');
});

// admin dashboard redirect
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
});
// user dashboard redirect
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

});
Route::get('/auth/google',[SocialController::class,'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback',[SocialController::class,'handleGoogleCallback']);



// features routes
Route::middleware('auth')->group(function () {
    //category

    Route::get('/category-index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{category}/delete', [CategoryController::class, 'delete'])->name('category.delete');

    //transaction
    Route::get('/transaction-index', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/transaction-create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/transaction-store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaction/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::patch('/transaction/{transaction}/update', [TransactionController::class, 'update'])->name('transaction.update');
    Route::get('/transaction/{transaction}/delete', [TransactionController::class, 'delete'])->name('transaction.delete');

    //budget
    Route::get('/budget-index', [BudgetController::class, 'index'])->name('budget.index');
    Route::get('/budget-create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('/budget-store', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('/budget/{budget}/edit', [BudgetController::class, 'edit'])->name('budget.edit');
    Route::patch('/budget/{budget}/update', [BudgetController::class, 'update'])->name('budget.update');
    Route::get('/budget/{budget}/delete', [BudgetController::class, 'delete'])->name('budget.delete');

    //report
    Route::get('/report-index', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report-export/{type}', [ReportController::class, 'export'])->name('report.export');
    //profile
    Route::get('/profile-edit', [ProfileUpdateController::class, 'edit'])->name('profile.edit');
    Route::post('/profile-update', [ProfileUpdateController::class, 'update'])->name('profile.update');

    Route::get('/user-list',[HomeController::class, 'userList'])->name('user.list');
    Route::get('/user-view/{id}',[HomeController::class, 'userView'])->name('user.view');
});

//breez default dashboard
Route::get('/dashboard', [HomeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');




require __DIR__.'/auth.php';
