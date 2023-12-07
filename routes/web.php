<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\front\UserLoginController;
use App\Http\Controllers\front\ProductsController;
use App\Http\Controllers\front\CheckoutController;

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

    Artisan::call('route:clear');
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
    Route::match(['get','post'], 'product_listing', [ProductsController::class, 'productListing'])->name('productlisting');
    Route::match(['get','post'], 'product_detail/{id}', [ProductsController::class, 'productDetail']);

    // Get Product price Route
    Route::post('get_product_price', [ProductsController::class, 'getProductPrice'])->name('get_product_price');

    
    // Routes for guests (not logged in)
    Route::group(['middleware' => 'web'], function () {
        // Route::get('/cart', [ProductsController::class, 'index'])->name('cart.index');
        // Route::post('/cart/add', [ProductsController::class, 'addtocart'])->name('cart.add');

        // Add to Cart 
        Route::match(['get','post'], '/add-to-cart', [ProductsController::class, 'addCart'])->name('addToCart');
    });

    
    // Routes for authenticated users
    Route::group(['middleware' => ['web', 'auth']], function () {
        Route::get('/cart/save', [ProductsController::class, 'savecart'])->name('cart.save');
    });
    
    
    // Middleware
    Route::group(['middleware' => ['checkuser']], function(){
        Route::get('/dashboard', [UserLoginController::class, 'dashboard'])->name('dashboard');
        Route::match(['get','post'], '/logout', [UserLoginController::class, 'logout'])->name('logout');
        Route::match(['get','post'], '/edit_profile', [UserLoginController::class, 'editProfile'])->name('editProfile');

        // Shopping Cart
        Route::get('view/cart', [ProductsController::class, 'viewCart'])->name('view_cart');

        // Update Cart item Quantity via Ajax
        Route::post('cart/update', [ProductsController::class, 'updateCartItemQty'])->name('updateCart');

        // Delete Cart items via Ajax
        Route::post('cart/delete', [ProductsController::class, 'deleteCartItem'])->name('deleteCart');

        // Checkout Route
        Route::get('cart/checkout', [CheckoutController::class, 'Checkout'])->name('checkout');

    });
