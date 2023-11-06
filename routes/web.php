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

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
//     Route::match(['get', 'post'], 'login', [AdminController::class, 'login']);
//     Route::group(['middleware' => ['admin']], function(){
//         // Route::get('dashboard', [AdminController::class, 'dashboard']);
//         // Route::get('logout', [AdminController::class, 'logout']);
//     });
// });

 Route::get('dashboard', [DashboardController::class, 'dashboard']);
 Route::match(['get', 'post'], '/create_account', [DashboardController::class, 'create_account']);
