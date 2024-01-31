<?php

use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\InstanceController;
use App\Http\Controllers\Admin\OrderController;


Route::resource('user', UserController::class)->except(['create', 'edit', 'show']);
Route::get('/users', [UserController::class, 'getUsers'])->name('getUsers');
Route::get('/user/one/{id}', [UserController::class, 'getOne'])->name('user.getOne');

Route::resource('instance', InstanceController::class)->except(['create', 'edit', 'show']);
Route::get('/instances', [InstanceController::class, 'getInstances'])->name('getInstances');
Route::get('/instance/one/{id}', [InstanceController::class, 'getOne'])->name('instance.getOne');

Route::get('/orders', [OrderController::class, 'getOrders'])->name('admin.orders');
