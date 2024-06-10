<?php

use App\Http\Controllers\WEB\AuthWebController;
use App\Http\Controllers\WEB\CustomerWebController;
use App\Http\Controllers\WEB\ProductWebController;
use App\Http\Controllers\WEB\TransactionDetailWebController;
use App\Http\Controllers\WEB\ViewWebController;
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


Route::get('/loginIndex', [ViewWebController::class, 'loginIndex']);
Route::get('/registerIndex', [ViewWebController::class, 'registerIndex']);
Route::post('/register', [AuthWebController::class, 'register']);
Route::post('/login', [AuthWebController::class, 'login']);
Route::get('/logout', [AuthWebController::class, 'logout']);

Route::middleware(['session.token'])->prefix('')->group(function () {
    Route::get('/', [ViewWebController::class, 'berandaView']);
    // product
    Route::get('/product/index', [ViewWebController::class, 'productIndex']);
    Route::post('/product/create', [ProductWebController::class, 'create']);
    Route::post('/product/edit', [ProductWebController::class, 'update']);
    Route::get('/product/delete/{id}', [ProductWebController::class, 'delete']);
    Route::get('/product/create-index', [ViewWebController::class, 'productCreateIndex']);
    Route::get('/product/edit-index/{id}', [ViewWebController::class, 'productEditIndex']);

    // customer
    Route::get('/customer/index', [ViewWebController::class, 'customerIndex']);
    Route::post('/customer/create', [CustomerWebController::class, 'create']);
    Route::post('/customer/edit', [CustomerWebController::class, 'update']);
    Route::get('/customer/delete/{id}', [CustomerWebController::class, 'delete']);
    Route::get('/customer/create-index', [ViewWebController::class, 'customerCreateIndex']);
    Route::get('/customer/edit-index/{id}', [ViewWebController::class, 'customerEditIndex']);
    // transaction detail
    Route::get('/transaction-detail/index', [ViewWebController::class, 'transactionDetailIndex']);
    Route::get('/transaction-detail/detail-index/{id}', [ViewWebController::class, 'transactionDetailDetailIndex']);
    Route::get('/transaction-detail/delete/{id}', [TransactionDetailWebController::class, 'delete']);
});
