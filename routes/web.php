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


Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();



Route::get('/', function () {
    return view('/home');
});




Route::get('/home', 'HomeController@index')->name('home');
Route::resource('cities','CityController');//cities
Route::resource('zones','ZoneController');//zones
Route::resource('colors','ColorsController');//colors
Route::resource('sizes','SizesController');//sizes
Route::resource('units','UnitController');//units
Route::resource('customers','CustomerController');//customers
Route::resource('suppliers','SupplierController');//suppliers

Route::resource('orderstats','orderstatsController');//orderstats
//categories
Route::resource('categories','CategoryController');
//users
Route::resource('users','UserController')->except(['show']);

//products
Route::resource('products','ProductController');


// ppurchase
Route::resource('Dpurchases','DpurchasesController');
Route::resource('mpurchase','MpurchasesController');

// pos sell
Route::resource('masterpos','MasterposController');
Route::post('masterpos/update/{id}','MasterposController@update')->name('masterpos.update');//update

Route::get('masterpos/DetailsposDelete/{id}','MasterposController@DetailsposDelete')->name('masterpos.DetailsposDelete');






// Route::get('category', 'CategorysController@index')->name('category');
// Route::get('category/create', 'CategorysController@create')->name('create');
//  Route::get('category/edit/{id}','CategorysController@edit')->name('category.edit');
// Route::post('category/store','CategorysController@store')->name('category.store');
// Route::post('category/update/{id}','CategorysController@update')->name('category.update');
// Route::get('category/delete/{id}','CategorysController@destroy')->name('category.delete');