<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductsController;



Auth::routes();
Route::get('/', [ProductsController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index'])->name('admin.home')->middleware('role:admin');
Route::get('/admin/{id}', [AdminController::class, 'changeData'])->name('admin.change')->middleware('role:admin');
Route::post('/admin/create-change/{id}', [AdminController::class, 'createChange'])->middleware('role:admin');
Route::post('/admin/update', [AdminController::class, 'updateData'])->middleware('role:admin');
