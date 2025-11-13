<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('layouts.admin');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/dashboard/users',[UserController::class, 'index'])->name('user.all');
Route::get('/dashboard/users/view',[UserController::class, 'view'])->name('user.view');
Route::get('/dashboard/users/edit',[UserController::class, 'edit'])->name('user.edit');
Route::get('/dashboard/users/add',[UserController::class, 'add'])->name('user.add');


// Banner page
Route::get('/dashboard/banners', [BannerController::class, 'index'])->name('banner.all');


require __DIR__.'/auth.php';
