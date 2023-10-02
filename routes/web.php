<?php

use App\Http\Controllers\productController;
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

Route::prefix('products')->name('products.')->group(static function () {
    Route::get('', [productController::class, 'index'])->name('index');
    Route::post('', [productController::class, 'store'])->name('store');
    Route::get('create', [productController::class, 'create'])->name('create');

    Route::prefix('{event_id}')->group(static function () {
        Route::put('', [productController::class, 'update'])->name('update');
        Route::delete('', [productController::class, 'destroy'])->name('delete');
        Route::get('edit', [productController::class, 'edit'])->name('edit');
    });
});
