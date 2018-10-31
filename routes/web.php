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
Route::get('/account/profile', 'ProfileController@getProfile')->name('profile')->middleware('verified');
Route::post('/account/edit-profile', 'ProfileController@postEditProfile')->name('post-edit-profile')->middleware('verified');
Route::get('/account/edit-profile', 'ProfileController@getEditProfile')->name('get-edit-profile')->middleware('verified');
//account
Route::get('/account/logo', 'ProfileController@getLogo')->name('logo')->middleware('verified');

Route::get('/account/edit-email', 'ProfileController@getEditEmail')->name('get-edit-email')->middleware('verified');
Route::post('/account/edit-email', 'ProfileController@postEditEmail')->name('post-edit-email')->middleware('verified');

Route::get('/account/edit-password', 'ProfileController@getEditPassword')->name('get-edit-password')->middleware('auth');
Route::post('/account/edit-password', 'ProfileController@postEditPassword')->name('post-edit-password')->middleware('verified');

Route::get('/account/field', 'ProfileController@getField')->name('field')->middleware('verified');

Route::get('/account/description', 'ProfileController@getDescription')->name('get-description')->middleware('verified');
Route::get('/account/edit-description', 'ProfileController@getEditDescription')->name('get-edit-description')->middleware('verified');
Route::post('/account/edit-description', 'ProfileController@postEditDescription')->name('post-edit-description')->middleware('verified');

Route::get('/account/requisites', 'ProfileController@getRequisites')->name('requisites')->middleware('verified');
Route::get('/account/notifications', 'ProfileController@getNotifications')->name('notifications')->middleware('verified');
Route::get('/account/orders', 'ProfileController@getOrders')->name('orders')->middleware('verified');
Route::get('/account/price', 'ProfileController@getPrice')->name('price')->middleware('verified');
Route::get('/account/referal', 'ProfileController@getReferal')->name('referal')->middleware('verified');
Route::get('/account/bill', 'ProfileController@getBill')->name('bill')->middleware('verified');
Route::get('/account/documents', 'ProfileController@getDocuments')->name('documents')->middleware('verified');
Route::get('/account/referal-partner', 'ProfileController@getReferalPartner')->name('referal-partner')->middleware('verified');
Route::get('/account/payment', 'ProfileController@getPayment')->name('payment')->middleware('verified');
Route::get('/account/products', 'ProfileController@getProducts')->name('products')->middleware('verified');

//search routes
Route::get('/search', 'SearchController@search' )->name('search')->middleware('verified');
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

//custom orders
Route::get('/custom-order-create', 'CustomOrderController@getCustomOrderCreate')->name('get-custom-order-create')->middleware('verified');
Route::post('/custom-order-create', 'CustomOrderController@postCustomOrderCreate')->name('post-custom-order-create')->middleware('verified');
Route::get('/custom-order-success', 'CustomOrderController@getCustomOrderSuccess')->name('get-custom-order-success')->middleware('verified');

//products not resource
Route::get('/products', 'ProductController@index')->name('get-all-products')->middleware('verified');
Route::get('/product-create', 'ProductController@getProductCreate')->name('get-product-create')->middleware('verified');
Route::post('/product-create', 'ProductController@postProductCreate')->name('post-product-create')->middleware('verified');
Route::get('/product-success', 'ProductController@getProductSuccess')->name('get-product-success')->middleware('verified');

//feedback mail
Route::post('/feedback/send', 'FeedbackController@send')->name('feedback-send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
