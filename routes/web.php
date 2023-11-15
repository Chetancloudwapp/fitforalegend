<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\front\UserLoginController;

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
    Route::get('/', [UserLoginController::class, 'home'])->name('web.home');
    Route::match(['get','post'], '/register_user', [UserLoginController::class, 'register_user'])->name('web.registerUser');
    Route::match(['get','post'], '/user_login', [UserLoginController::class, 'user_login'])->name('web.login');
    
    Route::group(['middleware' => ['checkuser']], function(){
        Route::get('/dashboard', [UserLoginController::class, 'dashboard'])->name('web.dashboard');
        Route::match(['get','post'], '/logout', [UserLoginController::class, 'logout'])->name('web.logout');

        Route::match(['get','post'], '/edit_profile', [UserLoginController::class, 'editProfile'])->name('web.editProfile');
    });
});
