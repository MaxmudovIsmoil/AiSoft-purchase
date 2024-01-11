<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderActionController;


Route::get('login', function () {
    return view('auth.login');
});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth', 'isActive'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [OrderController::class, 'index']);

    // Order
    Route::resource('order', OrderController::class)->except(['create', 'edit', 'show']);
    Route::get('/order/one/{id}', [OrderController::class, 'getOne'])->name('order.getOne');
    Route::get('/order/comments/{id}', [OrderController::class, 'getOrderActionComments'])->name('order.getOrderActionComments');


    // order detail
    Route::get('/order-detail/one/{orderId}', [OrderDetailController::class, 'getOne'])->name('order_detail.getOne');
    Route::post('/order-detail/store/', [OrderDetailController::class, 'store'])->name('order_detail.store');
    Route::post('/order-detail/update/{id}', [OrderDetailController::class, 'update']);
    Route::delete('/order-detail/destroy/{id}', [OrderDetailController::class, 'destroy']);

    // order action
    Route::post('/order-action/', [OrderActionController::class, 'action'])->name('order.action');

    // user plan
    Route::resource('/user-plan', UserPlanController::class)->except(['create', 'edit', 'show']);
    Route::get('/user-plan/one/{id}', [UserPlanController::class, 'getOne'])->name('user-plan.getOne');
    Route::get('/user-plan/get-instances/{id}', [UserPlanController::class, 'getInstances'])->name('user-plan.getInstances');

    Route::post('/user/profile', [UserController::class, 'profile'])->name('user.profile');

});
