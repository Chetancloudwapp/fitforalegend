<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\front\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
//     Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);
//     Route::group(['middleware' => ['admin']], function(){
//         // Route::get('dashboard', [AdminController::class, 'dashboard']);
//         // Route::get('logout', [AdminController::class, 'logout']);
//     });
// });

Route::prefix('web')->group(function(){
    Route::get('/', [DashboardController::class, 'home'])->name('web.home');
    Route::match(['get','post'], '/register_user', [DashboardController::class, 'register_user'])->name('web.registerUser');
    Route::match(['get','post'], '/user_login', [DashboardController::class, 'user_login'])->name('web.login');
    Route::match(['get','post'], '/logout', [DashboardController::class, 'logout'])->name('web.logout');
});
 Route::group(['middleware' => ['checkuser']], function(){
     Route::get('dashboard', [DashboardController::class, 'dashboard']);
 });
