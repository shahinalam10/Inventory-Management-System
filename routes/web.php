<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\ItemController;


Route::get('/',[HomeController::class,'index'])->name('home');

// Brand Routes
Route::resource('brands', BrandController::class);
Route::resource('models', ModelController::class);
Route::resource('items', ItemController::class);


Route::get('models-by-brand/{brandId}', [ItemController::class, 'getModelsByBrand'])->name('models.byBrand');