<?php

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

Route::prefix('vendor')->group(function() {
    Route::get('/', 'VendorController@index');
    Route::match(['get', 'post'], '/vendor-login', 'VendorController@Vendorlogin');

    Route::group(['middleware' => ['vendor_auth']], function(){
        Route::get('/vendor-dashboard', 'VendorController@vendorDashboard');
        Route::get('/vendor-logout', 'VendorController@vendorLogout');
        Route::match(['get','post'], '/editvendors-shop', 'VendorController@editvendorShop');
        
        
        
        
        // Product
        Route::match(['get','post'], '/vendor-shop-view', 'VendorProductController@vendorShopView');
        Route::match(['get','post'], '/vendor-product', 'VendorProductController@index');
        Route::match(['get','post'], '/vendor-product/add', 'VendorProductController@addVendorProduct');
        // Route::match(['get','post'], '/vendor-product/edit/{id}', 'VendorProductController@addProduct');
        // Route::match(['get','post'], '/product/delete/{id}', 'VendorProductController@deleteProduct');
    });
});

Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    echo 'Clear';
    die();
});


