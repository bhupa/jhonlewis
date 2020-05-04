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


// payment for paypal

// route for processing payment
Route::post('paypal', 'PaymentController@store')->name('paypal.store');

Route::get('status', 'PaymentController@getPaymentStatus');


Route::get('/','HomeController@index')->name('home');
Route::get('/about-us','HomeController@getAbout')->name('about-us');
Route::get('/terms-conditions','HomeController@getTermCondition')->name('terms-conditions');
Route::get('/shipping','HomeController@getshipping')->name('shipping');


Route::get('/getSchedule','HomeController@getSchedule')->name('getSchedule');

Route::get('/register','RegisterController@index')->name('register');
Route::post('/register','RegisterController@store')->name('register.store');
Route::get('/how-to-get-prescription','HomeController@getPrescription')->name('how-to-get-prescription');
Route::get('/guarantee-warranty','HomeController@getWarranty')->name('guarantee-warranty');
Route::get('/returns-refunds','HomeController@getReturn')->name('returns-refunds');

Route::get('/nhs-entitlement','HomeController@getentitlement')->name('nhs-entitlement');


Route::resource('order','OrderController');
Route::post('/delivery','OrderController@getDelivery')->name('delivery');
Route::post('/payment','OrderController@getPayment')->name('payment');
Route::post('/order/review','OrderController@getreview')->name('order.review');
Route::post('/backDelivery','OrderController@getBackDelivery')->name('backDelivery');
Route::post('/backPayment','OrderController@getBackPayment')->name('backPayment');

Route::post('/back-address','OrderController@getBackAddress')->name('back-address');
//Route::get('/order','OrderController@index')->name('order.index');
//Route::post('/','OrderController@getAddress')->name('order.addaddress');
//Route::post('/addaddress','OrderController@addDelivery')->name('order.addaddress');
//Route::post('/addpayment','OrderController@addPayment')->name('order.addpayment');

Route::resource('cart','CartController');
Route::post('/cart/add/','CartController@add')->name('cart.add');

Route::get('/clear/','CartController@delete')->name('cart.clear');
Route::get('cart/remove/{id}','CartController@remove')->name('cart.remove');

Route::resource('contact-us','ContactController');
Route::get('/shoping-lists/single-page','ShopController@getSingle')->name('shoping-lists.single-page');
Route::get('/shoping-lists','ShopController@index')->name('shoping-lists.index');

Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');
Route::get('/login','LoginController@showForm')->name('login');

//Route::resource('/appointment','AppointmentController');
Route::get('/appointment','AppointmentController@index')->name('appointment.index');
Route::get('book-appointment/{id}','AppointmentController@getBook')->name('book-appointment');

Route::resource('package','PackageController');
Route::resource('blog','BlogController');
Route::resource('service','ServiceController');
Route::resource('testimonial','TestimonialController');
Route::get('frame-brands','ProductController@index')->name('frame-brands');
Route::resource('product','ProductController');

Route::resource('/glass','GlassController');
Route::resource('/lens','LensController');
Route::resource('brands','BrandController');
//Route::resource('/frame','FrameController');
//Route::resource('/frame-category','FrameCategoryController');
Route::resource('/shop','ShopController');
Route::resource('content','ContentController');

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/resettoken/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.resettoken');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');



// Route for the auth user

Route::group(['middleware'=>'auth'], function() {
    Route::get('/profile','ProfileController@index')->name('profile');
    Route::post('/profile/store','ProfileController@store')->name('profile.store');
    Route::get('/profile/view','ProfileController@getProfile')->name('getprofile');
   Route::resource('order-lists','PurchaseOrderListsController');
   Route::resource('wishlist','WishListController');
    Route::post('/appointment/store','AppointmentController@store')->name('appointment.store');
    Route::get('/appointment/lists','AppointmentController@show')->name('appointment.lists');

    Route::post('/login/store','LoginController@store')->name('login.store');
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
    Route::post('services/sort', 'ServiceController@sort')->name('services.sort');

    // content router
    Route::resource('contents','ContentController');
    Route::post('/contents/change-status','ContentController@changeStatus')->name('contents.change-status');

    // content router
    Route::resource('doctors','DoctorController');
    Route::post('/doctors/change-status','DoctorController@changeStatus')->name('doctors.change-status');

    // Appointments router
    Route::resource('appointments','AppointmentController');

    // settings router
    Route::resource('settings','SettingController');
    Route::post('/settings/change-status','SettingController@changeStatus')->name('settings.change-status');

    //contactus router
    Route::resource('contacts','ContactController');

    // testimonials router
    Route::resource('testimonials','TestimonialController');
    Route::post('/testimonials/change-status','TestimonialController@changeStatus')->name('testimonials.change-status');

    // glasses router
    Route::resource('glasses','GlassesController');
    Route::post('/glasses/change-status','GlassesController@changeStatus')->name('glasses.change-status');

    // glasses router
    Route::resource('sunglasses','SunglassesController');
    Route::post('/sunglasses/change-status','SunglassesController@changeStatus')->name('sunglasses.change-status');

    // lenses router
    Route::resource('lenses','LensesController');
    Route::post('/lenses/change-status','LensesController@changeStatus')->name('lenses.change-status');

    // frame router
    Route::resource('frames','FrameController');
    Route::post('/frames/change-status','FrameController@changeStatus')->name('frames.change-status');
    Route::post('/frames/get-category','FrameController@getCategory')->name('frames.get-category');

    // frame category router
    Route::resource('frame-categories','FrameCategoryController');
    Route::post('/frame-categories/change-status','FrameCategoryController@changeStatus')->name('frame-categories.change-status');

    // Discount router
    Route::resource('discounts','DiscountController');
    Route::post('/discounts/change-status','DiscountController@changeStatus')->name('discounts.change-status');


    // product router
    Route::resource('products','ProductController');
    Route::post('/products/change-status','ProductController@changeStatus')->name('products.change-status');
    Route::post('/products/change-shipping','ProductController@changeShipping')->name('products.change-shipping');
    Route::post('/products/get-product-category','ProductController@getCategory')->name('products.get-product-category');

    Route::post('/stocks/change-status','StockController@changeStatus')->name('stocks.change-status');
    Route::prefix('stocks')->group(function(){
        Route::get('/{product_id}','StockController@index')->name('stocks.index');
        Route::get('/{product_id}/create', 'StockController@create')->name('stocks.create');
        Route::post('/store', 'StockController@store')->name('stocks.store');
        Route::get('/edit/{slug}', 'StockController@edit')->name('stocks.edit');
        Route::put('/update/{slug}', 'StockController@update')->name('stocks.update');
        Route::delete('/{id}', 'StockController@destroy')->name('stocks.destroy');



    });

    Route::resource('product-lists','ProductListsController');
    Route::post('/product-lists/change-status','ProductListsController@changeStatus')->name('product-lists.change-status');

    // color route
    Route::resource('colors','ColorController');
    Route::resource('orders','OrderController');
    Route::post('/released','OrderController@changeStatus')->name('orders.released');
    Route::post('/orders/return','OrderController@getReturn')->name('orders.return');

    Route::resource('sales','SalesController');
    Route::post('/realeased','SalesController@changeStatus')->name('sales.realeased');
    Route::post('/return','SalesController@getReturn')->name('sales.return');

    // color route
    Route::resource('schedules','ScheduleController');
    Route::post('/schedules/change-status','ScheduleController@changeStatus')->name('schedules.change-status');

    Route::resource('users','UserController');
    Route::post('/users/change-status','UserController@changeStatus')->name('users.change-status');


    Route::resource('notifications','NotificationController');
    Route::resource('brand','BrandController');
    Route::post('/brand/change-status','BrandController@changeStatus')->name('brand.change-status');
    Route::post('/brand/add-to-sale','BrandController@addToSell')->name('brand.add-to-sale');

});
