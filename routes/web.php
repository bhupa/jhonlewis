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
Route::get('/about-us','HomeController@getAbout')->name('about-us');
Route::get('/terms-conditions','HomeController@getTermCondition')->name('terms-conditions');
Route::get('/shipping','HomeController@getshipping')->name('shipping');
Route::get('/register','HomeController@getRegister')->name('register');
Route::get('/how-to-get-prescription','HomeController@getPrescription')->name('how-to-get-prescription');
Route::get('/guarantee-warranty','HomeController@getWarranty')->name('guarantee-warranty');
Route::get('/returns-refunds','HomeController@getReturn')->name('returns-refunds');
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/contact-us','ContactController@index')->name('contact-us.index');
Route::get('/shoping-lists/single-page','ShopController@getSingle')->name('shoping-lists.single-page');
Route::get('/shoping-lists','ShopController@index')->name('shoping-lists.index');

Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');

Route::resource('/appointment','AppointmentController');
Route::resource('/package','PackageController');
Route::resource('/blog','BlogController');
Route::resource('/service','ServiceController');


// Route for the auth user

Route::group(['middleware'=>'auth'], function() {
    Route::get('/profile','ProfileController@index')->name('profile');
});

// backend login for the admin and recepeonist
Route::group(['namespace'=>'Backend','middleware'=>'auth'], function() {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    // Blog Categories Router
    Route::resource('blog_categories','BlogCategoriesController');
    Route::post('/blog_categories/change-status','BlogCategoriesController@changeStatus')->name('blog_categories.change-status');

    // blog router
    Route::resource('blogs','BlogController');
    Route::post('/blogs/change-status','BlogController@changeStatus')->name('blogs.change-status');

    // banner router
    Route::resource('banners','BannerController');
    Route::post('/banners/change-status','BannerController@changeStatus')->name('banners.change-status');

    // package router
    Route::resource('packages','PackageController');
    Route::post('/packages/change-status','PackageController@changeStatus')->name('packages.change-status');

    // service router
    Route::resource('services','ServiceController');
    Route::post('/services/change-status','ServiceController@changeStatus')->name('services.change-status');


    // content router
    Route::resource('contents','ContentController');
    Route::post('/contents/change-status','ContentController@changeStatus')->name('contents.change-status');

    // content router
    Route::resource('doctors','DoctorController');
    Route::post('/doctors/change-status','DoctorController@changeStatus')->name('doctors.change-status');

    // Appointments router
    Route::resource('appointments','AppointmentController');

});
