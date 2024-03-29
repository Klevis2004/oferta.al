<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AllController;
use App\Http\Controllers\ArtikulliController;
use App\Http\Controllers\MenaxherController;
use App\Http\Controllers\PreferencatController;
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
Route::get('/test', [AllController::class, 'test']);
Route::get('/dashboard', [AllController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/oferta/{id}', [AllController::class, 'oferta'])->name('oferta');
    Route::post('/oferta_store', [AllController::class, 'oferta_store'])->name('oferta_store');
    Route::post('/product_store', [AllController::class, 'product_store'])->name('product_store');
    Route::put('/check/{id}', [AllController::class, 'check'])->name('check');
    Route::put('/uncheck/{id}', [AllController::class, 'uncheck'])->name('uncheck');
    Route::put('/proces/{id}', [AllController::class, 'proces'])->name('proces');
    Route::put('/refuzuar/{id}', [AllController::class, 'refuzuar'])->name('refuzuar');
    Route::put('/product_check/{id}', [AllController::class, 'product_check'])->name('product_check');
    Route::put('/product_uncheck/{id}', [AllController::class, 'product_uncheck'])->name('product_uncheck');
    Route::put('staus_comm/{id}', [AllController::class, 'staus_comm'])->name('staus_comm');
    Route::put('/cmimi', [AllController::class, 'cmimi'])->name('cmimi');
    Route::put('/cmimi_total/{id}', [AllController::class, 'cmimi_total'])->name('cmimi_total');

    Route::get('/home', [MenaxherController::class, 'home'])->name('menaxher.index');
    Route::get('/kerkesat', [MenaxherController::class, 'kerkesat'])->name('menaxher.kerkesat');
    Route::get('/ne_shqyrtim', [MenaxherController::class, 'ne_shqyrtim'])->name('menaxher.ne_shqyrtim');
    Route::get('/konfirmo', [MenaxherController::class, 'konfirmo'])->name('menaxher.konfirmo');
    Route::get('/refuzuar', [MenaxherController::class, 'refuzuar'])->name('menaxher.refuzuar');
    Route::get('/per_prodhim', [MenaxherController::class, 'per_prodhim'])->name('menaxher.per_prodhim');
    Route::get('/oferta_refuzuar', [MenaxherController::class, 'oferta_refuzuar'])->name('menaxher.oferta_refuzuar');
    Route::get('/perfunduar', [MenaxherController::class, 'perfunduar'])->name('menaxher.perfunduar');
    Route::get('/ne_proces', [MenaxherController::class, 'ne_proces'])->name('menaxher.ne_proces');

    Route::get('/produktet', [ArtikulliController::class, 'index'])->name('produktet');
    Route::post('/create_produktet', [ArtikulliController::class, 'create'])->name('create_produktet');
    Route::get('/historiku', [ArtikulliController::class, 'historiku'])->name('historiku');

    Route::get('/preferencat', [PreferencatController::class, 'index'])->name('preferencat');
    Route::post('/storeWish', [PreferencatController::class, 'storeWish'])->name('storeWish');
    Route::put('/unlike/{id}', [PreferencatController::class, 'unlike'])->name('unlike');
    Route::put('/like/{id}', [PreferencatController::class, 'like'])->name('like');


});

require __DIR__ . '/auth.php';
