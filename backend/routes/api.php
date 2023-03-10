<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Http\Request;
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

// Route::controller(ProductTypeController::class)->prefix('product-type')->group(function(){
//     Route::get('/','get_all_product_type_controller');
//     Route::get('/{id}','get_specific_product_type');
//     Route::post('/', 'create_product_type');
// });

Route::group(['namespace'=>"App\Http\Controllers"],function(){
    Route::apiResource('product-type',ProductTypeController::class);
    Route::apiResource('product', ProductController::class);
});
