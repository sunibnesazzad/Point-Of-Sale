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

Route::get('/', 'SessionController@create')->name('login');

/*Route::get('/pdfview','DetailController@pdfview')->name('pdfview');*/

//login and register part
/*Route::get('/login', 'SessionController@create');*/
Route::post('/log','SessionController@store');
Route::get('/logout','SessionController@destroy')->name('logout');
Route::get('/register','RegistrationController@create')->name('register');
Route::post('/register','RegistrationController@store');

///using route middleware
Route::group(array('middleware' => 'auth'), function() {
    //showing Dashboard
    Route::get('/customer','CustomerController@show')->name("dashboard");
    //showing all customer view
    Route::get('/customers','CustomerController@index')->name("customers.index");
    //ading customer
    Route::get('/addcustomers','CustomerController@create')->name("customers.add");
    //storing customers
    Route::post('/addcustomers','CustomerController@store');
    //datatables Route
    Route::get('datatable/customers', [ 'as'=>'datatable.customers','uses'=>'CustomerController@getCustomers' ]);

    //Product part
    Route::get('/product','ProductController@index')->name("product.index");
    Route::post('/product','ProductController@store');
    //update product
    Route::get('/update/product/{id}','ProductController@update')->name('product.update');
    Route::post('/update/product/{id}','ProductController@edit')->name('product.edit');
    //deleting category
    Route::get('/product/delete/{id}','ProductController@destroy')->name('product.delete');



    //detail part
    Route::get('/detail','DetailController@create')->name('enterDetail');

    Route::post('/detail','DetailController@store');

    /*Route::get('/customer','CustomerController@show')->name("showDetail");*/
    //for pdf view
    Route::get('/pdfview','DetailController@pdf')->name('pdfview');
    //showing Profile view
    Route::get('/dash/{id}','ProfileController@show')->name('dash');
    //showing Edit profile page
    Route::get('/edit_profile','ProfileController@update')->name('editProfile');
    //editing profile
    Route::post('/edit/{id}','ProfileController@edit');


});