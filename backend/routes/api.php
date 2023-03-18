<?php

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

// Route::controller(UserController::class)->prefix('user')->group(function(){
//     Route::get('/', 'get_all_users');
//     Route::get('/{id}','get_single_user');
// });

Route::controller(OrderController::class)->prefix('order')->group(function(){
    Route::get('/','get_all');
    Route::get('/{id}','get_specific');
    Route::post('/', 'create_new');
    Route::put('/{id}','update_order');
    Route::delete('/{id}','delete_order');
});

Route::group(['namespace'=>"App\Http\Controllers"],function(){
    Route::apiResource('product-type',ProductTypeController::class);
    Route::apiResource('product', ProductController::class);
    Route::apiResource('order', OrderController::class);
});
