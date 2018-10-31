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
Route::get('/account/profile', 'ProfileController@getProfile')->name('profile');
Route::post('/account/edit-profile', 'ProfileController@postEditProfile')->name('post-edit-profile');
Route::get('/account/edit-profile', 'ProfileController@getEditProfile')->name('get-edit-profile');
//account
Route::get('/account/logo', 'ProfileController@getLogo')->name('logo');

Route::get('/account/edit-email', 'ProfileController@getEditEmail')->name('get-edit-email');
Route::post('/account/edit-email', 'ProfileController@postEditEmail')->name('post-edit-email');

Route::get('/account/edit-password', 'ProfileController@getEditPassword')->name('get-edit-password');
Route::post('/account/edit-password', 'ProfileController@postEditPassword')->name('post-edit-password');

Route::get('/account/field', 'ProfileController@getField')->name('field');

Route::get('/account/description', 'ProfileController@getDescription')->name('get-description');
Route::get('/account/edit-description', 'ProfileController@getEditDescription')->name('get-edit-description');
Route::post('/account/edit-description', 'ProfileController@postEditDescription')->name('post-edit-description');

Route::get('/account/requisites', 'ProfileController@getRequisites')->name('requisites');
Route::get('/account/notifications', 'ProfileController@getNotifications')->name('notifications');
Route::get('/account/orders', 'ProfileController@getOrders')->name('orders');
Route::get('/account/price', 'ProfileController@getPrice')->name('price');
Route::get('/account/referal', 'ProfileController@getReferal')->name('referal');
Route::get('/account/bill', 'ProfileController@getBill')->name('bill');
Route::get('/account/documents', 'ProfileController@getDocuments')->name('documents');
Route::get('/account/referal-partner', 'ProfileController@getReferalPartner')->name('referal-partner');
Route::get('/account/payment', 'ProfileController@getPayment')->name('payment');
Route::get('/account/products', 'ProfileController@getProducts')->name('products');

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
Route::get('/order-create', 'OrderController@getOrderCreate')->name('get-order-create');
Route::post('/order-create', 'OrderController@postOrderCreate')->name('post-order-create');
Route::get('/order-success', 'OrderController@getOrderSuccess')->name('get-order-success');
Route::get('/order-payment', 'OrderController@getOrderPayment')->name('get-order-payment');

//custom orders
Route::get('/custom-order-create', 'CustomOrderController@getCustomOrderCreate')->name('get-custom-order-create');
Route::post('/custom-order-create', 'CustomOrderController@postCustomOrderCreate')->name('post-custom-order-create');
Route::get('/custom-order-success', 'CustomOrderController@getCustomOrderSuccess')->name('get-custom-order-success');

//products not resource
Route::get('/product-create', 'ProductController@getProductCreate')->name('get-product-create');
Route::post('/product-create', 'ProductController@postProductCreate')->name('post-product-create');
Route::get('/product-success', 'ProductController@getProductSuccess')->name('get-product-success');

//feedback mail
Route::post('/feedback/send', 'FeedbackController@send')->name('feedback-send');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
