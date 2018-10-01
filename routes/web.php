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
//Log in routes

Route::get('/', 'SessionController@create')->name('login');

Route::post('/log','SessionController@store');

/*Route::get('/logout','SessionController@destroy')->name('logout');*/
Route::get('/logout', [
    'as'	=>	'logout',
    'uses' 	=>	'SessionController@destroy'
]);


///DashBoard Routes
Route::group(array('middleware' => 'auth'), function()
{

    Route::get('/customer', [
        'as'	=>	'dashboard',
        'uses' 	=>	'CustomerController@show'
    ]);

});


// Order Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::post('/orderProduct', [
        'as'	=>	'product.order',
        'uses' 	=>	'OrderController@productOrder'
    ]);

    Route::post('/payment', [
        'as'	=>	'product.payment',
        'uses' 	=>	'OrderController@payment'
    ]);

    Route::get('/remove/product/{id}', [
        'as'	=>	'product.remove',
        'uses' 	=>	'OrderController@remove'
    ]);

});


// Invoice Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/showInvoice/{id}', [
        'as'	=>	'invoice.show',
        'uses' 	=>	'InvoiceController@show'
    ]);

    Route::get('/pdfview/{id}', [
        'as'	=>	'pdfview',
        'uses' 	=>	'InvoiceController@pdf'
    ]);

});



// Profile Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/dash/{id}', [
        'as'	=>	'dash',
        'uses' 	=>	'ProfileController@show'
    ]);

    Route::get('/edit_profile', [
        'as'	=>	'editProfile',
        'uses' 	=>	'ProfileController@update'
    ]);

    Route::post('/edit/{id}', [
        'as'	=>	'profile.update',
        'uses' 	=>	'ProfileController@edit'
    ]);


});


// customer Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/customers', [
        'as'	=>	'customers.index',
        'uses' 	=>	'CustomerController@index'
    ]);

    Route::get('/addcustomers', [
        'as'	=>	'customers.add',
        'uses' 	=>	'CustomerController@create'
    ]);

    Route::post('/addcustomers', [
        'as'	=>	'customers.store',
        'uses' 	=>	'CustomerController@store'
    ]);


});


// Product Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/product', [
        'as'	=>	'product.index',
        'uses' 	=>	'ProductController@index'
    ]);

    Route::post('/product', [
        'as'	=>	'product.store',
        'uses' 	=>	'ProductController@store'
    ]);

    Route::get('/update/product/{id}', [
        'as'	=>	'product.update',
        'uses' 	=>	'ProductController@update'
    ]);

    Route::post('/update/product/{id}', [
        'as'	=>	'product.edit',
        'uses' 	=>	'ProductController@edit'
    ]);

    Route::get('/product/delete/{id}', [
        'as'	=>	'product.delete',
        'uses' 	=>	'ProductController@destroy'
    ]);


});


// Sell Routes

Route::group(array('middleware' => 'auth'), function ()
{
    Route::get('/sales', [
        'as'	=>	'sales.index',
        'uses' 	=>	'SaleController@index'
    ]);

    Route::post('/cart', [
        'as'	=>	'sale.store',
        'uses' 	=>	'SaleController@store'
    ]);

    Route::get('/update/product/{id}', [
        'as'	=>	'product.update',
        'uses' 	=>	'ProductController@update'
    ]);

    Route::post('/sale/delete/{id}', [
        'as'	=>	'sale.delete',
        'uses' 	=>	'SaleController@destroy'
    ]);

    Route::get('/product/delete/{id}', [
        'as'	=>	'product.delete',
        'uses' 	=>	'ProductController@destroy'
    ]);


});


Route::get('/logout','SessionController@destroy')->name('logout');
Route::get('/register','RegistrationController@create')->name('register');