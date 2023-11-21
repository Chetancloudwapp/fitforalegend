<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\front\UserLoginController;
use App\Http\Controllers\front\ProductsWebController;

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
Route::get('clear', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');

    Artisan::call('route:cache');
    Artisan::call('view:clear');
    Artisan::call('optimize:clear');
    // Artisan::call('dump-autoload');
    return "Cleared!";
});

// Route::prefix('web')->group(function(){
    Route::get('/', [UserLoginController::class, 'home'])->name('home');
    Route::match(['get','post'], '/register_user', [UserLoginController::class, 'register_user'])->name('registerUser');
    Route::match(['get','post'], '/user_login', [UserLoginController::class, 'user_login'])->name('login');

    // Products listing and detail routes
    Route::match(['get','post'], 'product_listing', [ProductsWebController::class, 'productListing'])->name('productlisting');
    Route::match(['get','post'], '/product_detail/{id}', [ProductsWebController::class, 'productDetail'])->name('productDetail');

    // Add to Cart 
    Route::match(['get','post'], '/add-to-cart', [ProductsWebController::class, 'addCart'])->name('addToCart');
    
    // Middleware
    Route::group(['middleware' => ['checkuser']], function(){
        Route::get('/dashboard', [UserLoginController::class, 'dashboard'])->name('dashboard');
        Route::match(['get','post'], '/logout', [UserLoginController::class, 'logout'])->name('logout');

        Route::match(['get','post'], '/edit_profile', [UserLoginController::class, 'editProfile'])->name('editProfile');
    });
// });

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    echo '5';
    die();
});
