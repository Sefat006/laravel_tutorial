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

// post -> data jabe page to database e
// get -> for getting data from db and displaying in the site

Route::get('/dashboard', function () {
    return view('admin.dashboard.home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->get('/dashboard/users',[UserController::class, 'index'])->name('user.all');
Route::middleware('auth')->get('/dashboard/users/view',[UserController::class, 'view'])->name('user.view');
Route::middleware('auth')->get('/dashboard/users/edit',[UserController::class, 'edit'])->name('user.edit');
Route::middleware('auth')->get('/dashboard/users/add',[UserController::class, 'add'])->name('user.add');


// Banner page
Route::middleware('auth')->get('/dashboard/banners', [BannerController::class, 'index'])->name('banner.all');
Route::middleware('auth')->get('/dashboard/banners/add', [BannerController::class, 'create'])->name('banner.add');
Route::middleware('auth')->post('/dashboard/banners/insert', [BannerController::class, 'insert'])->name('banner.insert');
Route::middleware('auth')->get('/dashboard/banners/view/{slug}', [BannerController::class, 'view'])->name('banner.view');


require __DIR__.'/auth.php';
