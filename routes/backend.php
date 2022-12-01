<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => 'backend',
    'as' => 'backend.',
    'middleware' => 'auth:backend',
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('index');
    Route::get('logout', function () {
        auth()->logout();
    })->name('logout');
});



Route::group([
    'prefix' => 'backend',
    'as' => 'backend.',
    'middleware' => 'guest:backend',
], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('loginView');
    Route::post('login', [AuthController::class, 'loginAuth'])->name('loginAuth');
});