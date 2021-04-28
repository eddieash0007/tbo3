<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/categories/{slug}',[
    'uses' => 'FrontEndController@SingleCategory',
    'as' => 'category.single'
]);

Route::get('/product/{slug}',[
    'uses' => 'SingleProductController@index',
    'as' => 'product.single'
]);


Auth::routes();


Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    // Categories routes**************************************************************
    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories.index'
    ]);
    
    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'categories.create'
    ]);
    
    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'categories.store'
    ]);
    
    Route::get('/category/edit/{slug}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);
    
    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);
    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);
    
    
    Route::get('/category/results',[
        'uses' => 'CategoriesController@search',
        'as' => 'category.search'
    ]);
    
    
    
    // ********************************************************************************
    
    // Products Routes*****************************************************************
    Route::get('/products',[
        'uses' => 'ProductsController@index',
        'as' => 'products.index'
    ]);
    
    Route::get('/product/create',[
        'uses' => 'ProductsController@create',
        'as' => 'products.create'
    ]);
    
    Route::post('/product/store',[
        'uses' => 'ProductsController@store',
        'as' => 'products.store'
    ]);
    
    Route::get('/product/edit/{id}',[
        'uses' => 'ProductsController@edit',
        'as' => 'product.edit'
    ]);
    
    Route::post('/product/update/{id}',[
        'uses' => 'ProductsController@update',
        'as' => 'product.update'
    ]);
    
    // Route::get('/product/delete/{id}',[
    //     'uses' => 'ProductsController@destroy',
    //     'as' => 'product.destroy'
    // ]);
    
    
    Route::get('/product/trash/{id}' , [
        'uses' => 'ProductsController@destroy',
        'as' => 'product.destroy'
    ]);
    
    Route::get('/product/delete/{id}',[
        'uses' => 'ProductsController@delete',
        'as' => 'product.delete'
    ]);
    Route::get('/product/restore/{id}',[
        'uses' => 'ProductsController@restore',
        'as' => 'product.restore'
    ]);
    Route::get('/products/trashed',[
        'uses' => 'ProductsController@trashed',
        'as' => 'products.trashed'
    ]);

    Route::get('/results', [
        'uses' => 'ProductsController@search',
        'as' => 'products.search'
    ]);

    
    // ********************************************************************************
    // User Routes*********************************************************************
    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);
    
    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);
    
    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);
    Route::get('user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);
    
    Route::get('user/not-admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);
    
    Route::get('user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);
    
    // ********************************************************************************
    // Settings Routes*****************************************************************
    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);
    
    Route::post('/settings/update',[
        'uses' => 'SettingsController@update',
        'as' => 'settings.update'
    ]);

    Route::get('/carousel',[
        'uses' => 'SettingsController@carousel',
        'as' => 'carousel'
    ]);

    Route::get('/carousel/first',[
        'uses' => 'SettingsController@first',
        'as' => 'carousel.first'
    ]);

    Route::get('/carousel/second',[
        'uses' => 'SettingsController@second',
        'as' => 'carousel.second'
    ]);

    Route::get('/carousel/third',[
        'uses' => 'SettingsController@third',
        'as' => 'carousel.third'
    ]);

    Route::get('/carousel/fourth',[
        'uses' => 'SettingsController@fourth',
        'as' => 'carousel.fourth'
    ]);
    // ********************************************************************************
    // Size Routes*****************************************************************
    Route::get('/sizes',[
        'uses' => 'SizeController@index',
        'as' => 'sizes'
    ]);

    Route::post('/size/store',[
        'uses' => 'SizeController@store',
        'as' => 'size.store'
    ]);

    Route::post('/size/update/{id}',[
        'uses' => 'SizeController@update',
        'as' => 'size.update'
    ]);

    Route::get('/size/create',[
        'uses' => 'SizeController@create',
        'as' => 'size.create'
    ]);

    Route::get('size/delete/{id}',[
        'uses' => 'SizeController@destroy',
        'as' => 'size.delete'
    ]);
    // ********************************************************************************  
     // Promotion Routes*****************************************************************  

     Route::get('/promotion',[
        'uses' => 'PromotionController@index',
        'as' => 'promotion'
    ]);

    Route::post('/promotion/store',[
        'uses' => 'PromotionController@store',
        'as' => 'promotion.store'
    ]);

    Route::post('/promotion/update/{id}',[
        'uses' => 'PromotionController@update',
        'as' => 'promotion.update'
    ]);

    Route::get('/promotion/create',[
        'uses' => 'PromotionController@create',
        'as' => 'promotion.create'
    ]);

    Route::get('promotion/delete/{id}',[
        'uses' => 'PromotionController@destroy',
        'as' => 'promotion.delete'
    ]);

 // ********************************************************************************  
     // Promotion Routes*****************************************************************  

    Route::get('/parent_categories',[
        'uses' => 'ParentCategoriesController@index',
        'as' => 'parentcategories'
    ]);
    
    Route::get('/parent_category/create',[
        'uses' => 'ParentCategoriesController@create',
        'as' => 'parentcategories.create'
    ]);
    
    Route::post('/parent_category/store',[
        'uses' => 'ParentCategoriesController@store',
        'as' => 'parentcategories.store'   
    ]);
    
    Route::get('/parent_category/edit/{slug}',[
        'uses' => 'ParentCategoriesController@edit',
        'as' => 'parentcategory.edit'
    ]);
    
    Route::post('/parent_category/update/{id}',[
        'uses' => 'ParentCategoriesController@update',
        'as' => 'parentcategory.update'
    ]);
    Route::get('/parent_category/delete/{id}',[
        'uses' => 'ParentCategoriesController@destroy',
        'as' => 'parentcategory.delete'
    ]);
});
