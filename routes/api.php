<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/add-product',[ProductController::class,'addProduct']);
Route::post('/update-product',[ProductController::class,'updateProduct']);
Route::post('/delete-product',[ProductController::class,'deleteProduct']);
Route::get('/pagination/paginate-data',[ProductController::class,'pagination']);
Route::get('/search',[ProductController::class,'search']);
