<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/companies');
    });

    // Company Routes
    Route::resource('companies', CompanyController::class, [
        'names' => [
            'index' => 'company.index',
        ],
    ]);

    // Client Routes
    Route::resource('clients', ClientController::class, [
        'names' => [
            'index' => 'client.index',
        ],
    ]);

    // Purchase Routes
    Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchase.store');

    // Product Routes
    Route::post('/companies/{company}/products/', [ProductController::class, 'store'])->name('product.store');
    Route::patch('/companies/{company}/products/{product}', [ProductController::class, 'update'])->name('product.update');

//    Route::get('/clients', [ClientController::class, 'index'])->name('client.index');
//    Route::get('/clients/create', [ClientController::class, 'create'])->name('client.create');
//    Route::post('/clients', [ClientController::class, 'store'])->name('client.store');
//    Route::get('/clients/{client}', [ClientController::class, 'show'])->name('client.show');
//    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
//    Route::patch('/clients/{client}', [ClientController::class, 'update'])->name('client.update');
});
