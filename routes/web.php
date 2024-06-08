<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('import', function () {
    return view('import');
});



Route::get('/index', [ProductController::class, 'index'])->name('products.index');

Route::get('/products/export', [ProductController::class, 'export'])->name('products.export');
Route::post('/products/import', [ProductController::class, 'import'])->name('products.import');

