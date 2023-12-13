<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', function () {
    return view('auth.login');
});
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::middleware(['auth', 'isActive'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('order.index');
    });

    Route::group(['prefix' => '/'], function() {
        Route::resource('order', OrderController::class)->except(['create', 'edit', 'show']);
        Route::get('/order/one/{id}', [OrderController::class, 'getOne'])->name('order.getOne');
    });


    Route::middleware('isAdmin')->group(function () {

        Route::group(['prefix' => '/'], function() {
            Route::resource('user', UserController::class)->except(['create', 'edit', 'show']);
            Route::get('/users', [UserController::class, 'getUsers'])->name('getUsers');
            Route::get('/user/one/{id}', [UserController::class, 'getOne'])->name('user.getOne');
            Route::post('/user/profile', [UserController::class, 'profile'])->name('user.profile');
        });

        Route::group(['prefix' => '/'], function() {
            Route::resource('instance', InstanceController::class)->except(['create', 'edit', 'show']);
            Route::get('/instances', [InstanceController::class, 'getInstances'])->name('getInstances');
            Route::get('/instance/one/{id}', [InstanceController::class, 'getOne'])->name('instance.getOne');
        });

    });

});
