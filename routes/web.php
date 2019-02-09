<?php


use Illuminate\Support\Facades\Route;

//welcome page
Route::get('/',[
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

//show single page for a product
Route::get('/product/{id}',[
    'uses' => 'FrontEndController@singleProduct',
    'as' => 'product.single'
]);

//add product to a cart
Route::post('/cart/add',[
    'uses' => 'ShoppingController@add_to_cart',
    'as' => 'cart.add'
]);

//show products in a cart
Route::get('/cart',[
    'uses' => 'ShoppingController@cart',
    'as' => 'cart'
]);

//delete a product in a cart
Route::get('/cart/delete/{id}',[
    'uses' => 'ShoppingController@cart_delete',
    'as' => 'cart.delete'
]);

//increase a product by 1 
Route::get('/cart/incr/{id}/{qty}',[
    'uses' => 'ShoppingController@incr',
    'as' => 'cart.incr'
]);

//decrease a product by 1 
Route::get('/cart/decr/{id}/{qty}',[
    'uses' => 'ShoppingController@decr',
    'as' => 'cart.decr'
]);

//rapidly add a product bt clicking into add to cart
Route::get('/cart/rapid/add/{id}',[
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid.add'
]);

Route::get('/cart/pay',[
    'uses' => 'ShoppingController@pay',
    'as' => 'cart.pay'
]);

Auth::routes();

//home is authenticated in HomeController
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'middleware' => 'admin'], function () {
    //show all products
    Route::get('/products',[
        'uses' => 'ProductsController@index',
        'as' => 'products'
    ]);

    //create new product
    Route::get('/products/new-product',[
        'uses' => 'ProductsController@create',
        'as' => 'product.create'
    ]);

    // store the product
    Route::post('/products/store',[
        'uses' => 'ProductsController@store',
        'as' => 'product.store'
    ]);

    //edit the product
    Route::get('/product/edit/{id}',[
        'uses' => 'ProductsController@edit',
        'as' => 'product.edit'
    ]);

    //delete the product
    Route::get('/product/destroy/{id}',[
        'uses' => 'ProductsController@destroy',
        'as' => 'product.delete'
    ]);

    //update the product
    Route::post('/product/update/{id}',[
        'uses' => 'ProductsController@update',
        'as' => 'product.update'
    ]);

});
