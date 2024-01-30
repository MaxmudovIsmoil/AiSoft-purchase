<?php

use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\OrderActionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderFileController;
use App\Http\Controllers\UserPlanController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('login');
});
Route::get('login', function () {
    return view('auth.login');
});

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth', 'isActive', 'setLang'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // Route::get('/', [OrderController::class, 'index']);

    // Order
    Route::resource('order', OrderController::class)->except(['create', 'edit', 'show']);
    Route::get('/order/one/{id}', [OrderController::class, 'getOne'])->name('order.getOne');
    Route::get('/order/comments/{id}', [OrderController::class, 'getOrderActionComments'])->name('order.getOrderActionComments');


    // order detail
    Route::get('/order/get-detail/{orderId}', [OrderDetailController::class, 'getOne'])->name('order_detail.getOne');
    Route::post('/order-detail/store/', [OrderDetailController::class, 'store'])->name('order_detail.store');
    Route::post('/order-detail/update/{id}', [OrderDetailController::class, 'update']);
    Route::delete('/order-detail/delete/{id}', [OrderDetailController::class, 'destroy']);

    // order file
    Route::get('/order/get-file/{id}', [OrderFileController::class, 'getFiles'])->name('order_files');
    Route::post('/order-file/store/', [OrderFileController::class, 'store'])->name('order_file.store');
    Route::delete('/order-file/delete/{id}', [OrderFileController::class, 'destroy']);

    // order action
    Route::get('/order/get-action/{orderId}', [OrderActionController::class, 'getOrderAction'])->name('order_action');
    Route::post('/order-action/', [OrderActionController::class, 'action'])->name('order.action');

    // order plan
    Route::get('/order/get-plan/{orderId}', [OrderController::class, 'getOrderPlan'])->name('order_plan');

    // user plan
    Route::resource('/user-plan', UserPlanController::class)->except(['create', 'edit', 'show']);
    Route::get('/user-plan/one/{id}', [UserPlanController::class, 'getOne'])->name('user-plan.getOne');
    Route::get('/user-plan/get-instances/{id}', [UserPlanController::class, 'getInstances'])->name('user-plan.getInstances');

    // user profile
    Route::post('/user/profile', [UserController::class, 'profile'])->name('user.profile');

    Route::get('locale/{locale}', [LocaleController::class, 'locale'])->name('locale');
});
