<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {

    // USER dashboard → accessible by USER + ADMIN
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])
        ->name('user.dashboard');

    // ADMIN dashboard → accessible by ADMIN ONLY
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');		
		
		Route::get('/admin/categories', [AdminController::class, 'categories'])->name('admin.categories');
		
		Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
		
		Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
		
		Route::get('/admin/categories/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');

		Route::put('/admin/categories/{id}', [AdminController::class, 'update'])->name('admin.update');
		
		Route::DELETE('/admin/categories/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
		
    });
});

