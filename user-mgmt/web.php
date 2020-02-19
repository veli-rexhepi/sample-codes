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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group([/*'name' => 'admin.', */'prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    
    Route::get('/listUserProfiles', 'HomeController@listUserProfiles')->name('listUserProfiles');
    Route::get('/createUserProfile', 'HomeController@createUserProfile')->name('createUserProfile');
    Route::post('/storeUserProfile', 'HomeController@storeUserProfile')->name('storeUserProfile');    
    Route::get('/displayUserProfile/{id}', 'HomeController@displayUserProfile')->name('displayUserProfile');
    Route::get('/editUserProfile/{id}', 'HomeController@editUserProfile')->name('editUserProfile');
    Route::post('/updateUserProfile/{id}', 'HomeController@updateUserProfile')->name('updateUserProfile'); 
    Route::get('/confirmDeleteUserProfile/{id}', 'HomeController@confirmDeleteUserProfile')->name('confirmDeleteUserProfile');   
    Route::get('/deleteUserProfile/{id}', 'HomeController@deleteUserProfile')->name('deleteUserProfile');

});

/* Email systems implemented - test versions */
/* SwiftMailer - plain text content */
// Route::get('/plain-email', [ 'uses' => 'EmailController@plainEmail',]);
/* SwiftMailer - html content */
// Route::get('/html-email', [ 'uses' => 'EmailController@htmlEmail',]);
/* Snowfire Beautymail - modern templates html content */
// Route::get('/beauty-email',[ 'uses' => 'EmailController@beautyEmail',]);