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

Auth::routes(['verify' => true]);
//mainpage
Route::get('/', 'MainController@index')->name('main');
//profile
Route::get('/user/{id}', 'AccountController@getAccount')->name('account')->middleware('verified');

Route::get('/account/profile', 'ProfileController@getProfile')->name('profile')->middleware('verified');
Route::post('/account/edit-profile', 'ProfileController@postEditProfile')->name('post-edit-profile')->middleware('verified');
Route::get('/account/edit-profile', 'ProfileController@getEditProfile')->name('get-edit-profile')->middleware('verified');
//account

Route::get('/account/edit-password', 'ProfileController@getEditPassword')->name('get-edit-password')->middleware('auth');
Route::post('/account/edit-password', 'ProfileController@postEditPassword')->name('post-edit-password')->middleware('verified');
Route::get('/account/notifications', 'ProfileController@getNotifications')->name('notifications')->middleware('verified');
Route::get('/account/orders', 'ProfileController@getOrders')->name('orders')->middleware('verified');
Route::get('/account/orders-sale', 'ProfileController@getOrdersForSale')->name('orders-sale')->middleware('verified');
Route::get('/account/referal', 'ProfileController@getReferal')->name('referal')->middleware('verified');
Route::get('/account/products', 'ProfileController@getProducts')->name('products')->middleware('verified');
Route::get('/account/notifications', 'NotificationsController@index')->name('notifications')->middleware('verified');
Route::get('/account/balance', 'ProfileController@getBalance')->name('balance')->middleware('verified');
Route::get('/account/cashback-form', 'ProfileController@getCashBackForm')->name('get-cashback-form')->middleware('verified');
Route::post('/account/cashback', 'ProfileController@postCashBackForm')->name('post-cashback-form')->middleware('verified');


//search routes
Route::get('/search', 'SearchController@search' )->name('search');
//static pages
Route::get('/about', 'StaticController@getAbout')->name('about');
Route::get('/how-it-works', 'StaticController@getHowItWorks')->name('how-it-works');
Route::get('/feedback', 'StaticController@getFeedback')->name('feedback');
Route::get('/license', 'StaticController@getLicenses')->name('license');

//products
//Route::Resource('products', 'ProductController');
//orders
//Route::Resource('orders', 'OrderController');
//orders not resource
Route::get('/order-create', 'OrderController@getOrderCreate')->name('get-order-create')->middleware('verified');
Route::post('/order-create', 'OrderController@postOrderCreate')->name('post-order-create')->middleware('verified');
Route::get('/order-success', 'OrderController@getOrderSuccess')->name('get-order-success')->middleware('verified');
Route::get('/order-payment', 'OrderController@getOrderPayment')->name('get-order-payment')->middleware('verified');
Route::post('/pay-accept', 'OrderController@payAccept')->name('pay-accept')->middleware('verified');
Route::post('/send-pay-accept', 'OrderController@sendPayAccept')->name('send-pay-accept')->middleware('verified');


Route::post('/do-order', 'OrderController@doOrder')->name('do-order')->middleware('verified');

//custom orders
Route::get('/custom-order/{id}', 'CustomOrderController@show')->name('custom-order-detail')->middleware('verified');
Route::get('/custom-order-create', 'CustomOrderController@getCustomOrderCreate')->name('get-custom-order-create');
Route::post('/custom-order-create', 'CustomOrderController@postCustomOrderCreate')->name('post-custom-order-create')->middleware('verified');
Route::get('/custom-order-success', 'CustomOrderController@getCustomOrderSuccess')->name('get-custom-order-success');
Route::get('/custom-orders', 'CustomOrderController@index')->name('get-all-custom-order');
Route::get('/custom-order-edit/{id}', 'CustomOrderController@getCustomOrderEdit')->name('get-custom-order-edit');
Route::post('/custom-orders-edit', 'CustomOrderController@postCustomOrderEdit')->name('post-custom-order-edit');

//products not resource
Route::get('/products', 'ProductController@index')->name('get-all-products');
Route::get('/products/{id}', 'ProductController@getProductsForCategory')->name('get-products-for-category');

Route::get('/product/{id}', 'ProductController@show')->name('product-detail');
Route::get('/product-create', 'ProductController@getProductCreate')->name('get-product-create')->middleware('verified');
Route::post('/product-create', 'ProductController@postProductCreate')->name('post-product-create')->middleware('verified');
Route::get('/product-success', 'ProductController@getProductSuccess')->name('get-product-success')->middleware('verified');

//feedback mail
Route::post('/feedback/send', 'FeedbackController@send')->name('feedback-send');

//notifications

//admin-panel
Route::get('/admin/logout', 'AdminController@logout')->name('admin-logout');
Route::get('/admin/login', 'AdminController@getLogin')->name('admin-get-login');
Route::post('/admin/login', 'AdminController@postLogin')->name('admin-post-login');
Route::get('/admin', 'AdminController@getAdminPage')->name('get-admin-page')->middleware('admin');
Route::get('/admin/user', 'AdminController@getUserProfile')->name('get-admin-user')->middleware('admin');
Route::get('/admin/referal', 'AdminController@getReferalPage')->name('admin-referal')->middleware('admin');
Route::get('/admin/referal/set_reward', 'AdminController@setReward')->name('admin-set-reward')->middleware('admin');
Route::get('/admin/orders-accept', 'AdminController@getOrdersAccept')->name('get-orders-accept')->middleware('admin');

//accept delivery
Route::get('/accept-delivery/{id}', 'NotificationsController@getAcceptDelivery')->name('get-accept-delivery')->middleware('verified');
Route::post('/accept-delivery', 'NotificationsController@PostAcceptDelivery')->name('post-accept-delivery')->middleware('verified');

Auth::routes();


