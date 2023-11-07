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

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::match(['get', 'post'], 'login', 'AdminController@login');

    Route::group(['middleware' => ['admin_auth']], function(){
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('logout', 'AdminController@logout');
       
        // Categories
        Route::match(['get','post'], '/category', 'CategoryController@index');
        Route::match(['get','post'], '/addcategory/{id?}', 'CategoryController@addEditCategory');
        Route::match(['get','post'], 'delete_categories/{id?}', 'CategoryController@destroy');
        
        // Add Subcategories
        Route::match(['get','post'], '/subcategory', 'CategoryController@subcategoryindex');
        Route::match(['get','post'], '/addsubcat/{id?}', 'CategoryController@subCategory');
        Route::match(['get', 'post'], '/delete_subcategories/{id?}', 'CategoryController@delete_subcategories');
        Route::post('get-subcategories', '/CategoryController@getSubcategories');
        
        // ChildCategories
        Route::match(['get','post'], '/childcategory', 'CategoryController@childcategoryindex');
        Route::match(['get','post'], '/addsubsubcat/{id?}', 'CategoryController@ChildCategory');
        Route::match(['get', 'post'], '/delete_childcategories/{id?}', 'CategoryController@delete_childcategories');
        
        // Products
        Route::match(['get','post'], '/product', 'ProductController@index');
        Route::match(['get','post'], '/product/add', 'ProductController@addProduct');
        Route::match(['get','post'], '/product/edit/{id}', 'ProductController@addProduct');
        Route::match(['get','post'], '/product/delete/{id}', 'ProductController@deleteProduct');
        Route::post('get-subcategory', 'ProductController@getSubcategory');
        Route::post('get-childcategory', 'ProductController@getChildcategory');

        // Variation
        Route::match(['get','post'], '/variation/add/{id}', 'ProductController@addVariation');
        
        // Brands 
        Route::match(['get','post'], '/brands', 'BrandController@index');
        Route::match(['get','post'], '/brands/add', 'BrandController@addbrands');
        Route::match(['get','post'], '/brands/edit/{id}', 'BrandController@addbrands');
        Route::match(['get','post'], '/brands/delete/{id}', 'BrandController@deletebrands');
        
        // Color
        Route::match(['get','post'], '/color', 'ColorController@index');
        Route::match(['get','post'], '/color/add', 'ColorController@addcolors');
        Route::match(['get','post'], '/color/edit/{id}', 'ColorController@addcolors');
        Route::match(['get','post'], '/color/delete/{id}', 'ColorController@deletecolor');
        
        // Vendors
        Route::match(['get','post'], '/vendors', 'VendorController@index');
        Route::match(['get','post'], '/vendors/add', 'VendorController@addVendors');
        Route::match(['get','post'], '/vendors/edit/{id}', 'VendorController@addVendors');
        Route::match(['get','post'], '/vendors/delete/{id}', 'VendorController@deletevendors');
    });
});

