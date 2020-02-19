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

Auth::routes();

/* Admin accessible pages */
Route::get('/displayMyBacketAuthUser', "CarController@displayMyBacketAuthUser");
Route::get('/listCars', "CarController@listCars")->name('listCars');
Route::get('/addACar', "CarController@addACar");
Route::post('/addACar', "CarController@store");
Route::get('/editCar/{car_id}', "CarController@editCar");
Route::post('/editCarConfirm/{car_id}', "CarController@editCarConfirm");
Route::get('/deleteCar/{car_id}', "CarController@deleteCar");

/* Guest accessible pages */
Route::get('/', "CarController@buyACarGuest")->name('buyACarGuest');
Route::get('/buyACarGuest', "CarController@buyACarGuest");
Route::post('/buyThisCarGuest/{car_id}', "CarController@buyThisCarGuest");
Route::get('/displayMyBacketGuest', "CarController@displayMyBacketGuest");
Route::get('/removeAllCarsGuest', "CarController@removeAllCarsGuest");
Route::get('/goToPaymentGuest', "CarController@goToPaymentGuest");

/* Auth User accessible pages */
Route::get('/buyACarAuthUser', "CarController@buyACarAuthUser");
Route::post('/buyThisCarAuthUser/{car_id}', "CarController@buyThisCarAuthUser");
Route::get('/buyCompletedAuthUser/{car_id}', "CarController@buyCompletedAuthUser");
Route::get('/removeAllCarsAuthUser', "CarController@removeAllCarsAuthUser");
Route::get('/displayMyBacketAuthUser', "CarController@displayMyBacketAuthUser");
Route::get('/goToPaymentAuthUser', "CarController@goToPaymentAuthUser");