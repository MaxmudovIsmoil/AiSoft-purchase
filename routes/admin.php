<?php

use App\Http\Controllers\admin\InstanceController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('user', UserController::class)->except(['create', 'edit', 'show']);
Route::get('/users', [UserController::class, 'getUsers'])->name('getUsers');
Route::get('/user/one/{id}', [UserController::class, 'getOne'])->name('user.getOne');

Route::resource('instance', InstanceController::class)->except(['create', 'edit', 'show']);
Route::get('/instances', [InstanceController::class, 'getInstances'])->name('getInstances');
Route::get('/instance/one/{id}', [InstanceController::class, 'getOne'])->name('instance.getOne');

