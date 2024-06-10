<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\CartApiController;
use App\Http\Controllers\API\ProductApiController;
use App\Http\Controllers\API\RatingApiController;
use App\Http\Controllers\API\TransactionDetailApiController;
use App\Http\Controllers\API\UserApiController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::POST('register', [AuthApiController::class, "register"]);
Route::POST('login', [AuthApiController::class, "login"]);

Route::GET("/product", [ProductApiController::class, "getAll"]);
Route::GET("/product/{id}", [ProductApiController::class, "getById"]);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::GET("/logout", [AuthApiController::class, "logout"]);

    //users route api
    Route::GET("/profile", [UserApiController::class, "profile"]);
    Route::PUT("/profile", [UserApiController::class, "editProfile"]);
    Route::POST("/photo-profile", [UserApiController::class, "editPhotoProfile"]);
    Route::GET("/delete-photo-profile", [UserApiController::class, "deletePhotoProfile"]);
    //product route api

    Route::POST("/product", [ProductApiController::class, "create"]);
    Route::DELETE("/product/{id}", [ProductApiController::class, "delete"]);
    //cart route api
    Route::GET("/cart", [CartApiController::class, "getByUser"]);
    Route::POST("/cart", [CartApiController::class, "addCart"]);
    Route::POST("/cart/checkout", [CartApiController::class, "checkout"]);
    Route::DELETE("/cart/{id}", [CartApiController::class, "delete"]);
    //cart route api
    Route::POST("/rating", [RatingApiController::class, "create"]);
    //transaction detail route api
    Route::POST("/transaction-detail", [TransactionDetailApiController::class, "create"]);
    Route::GET("/transaction-detail", [TransactionDetailApiController::class, "getByUser"]);
});
