<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::get('/',[ProductController::class,'index'])->name('products');
//Route::post('/add-product',[ProductController::class,'addProduct'])->name('add.product');
