<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
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

Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout'])->middleware('auth:sanctum');

Route::group(['namespace'=>"App\Http\Controllers",'middleware'=>'auth:sanctum'],function(){
    Route::apiResource('product-type',ProductTypeController::class);
    Route::apiResource('product', ProductController::class);
    Route::apiResource('order', OrderController::class);
    Route::apiResource('order-list', OrderListController::class);
});
