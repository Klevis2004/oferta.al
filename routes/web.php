<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AllController::class, 'welcome']);
Route::get('/dashboard', [AllController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/oferta/{id}', [AllController::class, 'oferta'])->name('oferta');
    Route::get('/produktet', [AllController::class, 'produktet'])->name('produktet');
    Route::post('/oferta_store', [AllController::class, 'oferta_store'])->name('oferta_store');
    Route::post('/product_store', [AllController::class, 'product_store'])->name('product_store');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

});

require __DIR__.'/auth.php';
