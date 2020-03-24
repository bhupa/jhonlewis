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

Route::get('/','HomeController@index')->name('home');

Route::get('/register','HomeController@getRegister')->name('register');
Route::get('/appointment','AppointmentController@index')->name('appointment.index');
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/contact-us','ContactController@index')->name('contact-us.index');
Route::get('/shoping-lists/single-page','ShopController@getSingle')->name('shoping-lists.single-page');
Route::get('/shoping-lists','ShopController@index')->name('shoping-lists.index');
Route::get('/packages','PackageController@index')->name('packages.index');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');


// Route for the auth user

Route::group(['middleware'=>'auth'], function() {
    Route::get('/profile','ProfileController@index')->name('profile');
});

// backend login for the admin and recepeonist
Route::group(['namespace'=>'Backend','middleware'=>'auth'], function() {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
});
