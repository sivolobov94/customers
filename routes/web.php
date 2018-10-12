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

Route::get('/account/edit-password', 'ProfileController@editPassword')->name('edit-password');
Route::get('/account/field', 'ProfileController@getField')->name('field');
Route::get('/account/description', 'ProfileController@getDescription')->name('description');
Route::get('/account/requisites', 'ProfileController@getRequisites')->name('requisites');
Route::get('/account/notifications', 'ProfileController@getNotifications')->name('notifications');
Route::get('/account/orders', 'ProfileController@getOrders')->name('orders');
Route::get('/account/price', 'ProfileController@getPrice')->name('price');
Route::get('/account/referal', 'ProfileController@getReferal')->name('referal');
Route::get('/account/bill', 'ProfileController@getBill')->name('bill');
Route::get('/account/documents', 'ProfileController@getDocuments')->name('documents');
Route::get('/account/referal-partner', 'ProfileController@getReferalPartner')->name('referal-partner');
Route::get('/account/payment', 'ProfileController@getPayment')->name('payment');
//search routes
Route::get('/search', 'SearchController@search' )->name('search');
//static pages
Route::get('/about', 'StaticController@getAbout')->name('about');
Route::get('/how-it-works', 'StaticController@getHowItWorks')->name('how-it-works');
Route::get('/feedback', 'StaticController@getFeedback')->name('feedback');
//products
Route::Resource('products', 'ProductController');
//orders
Route::Resource('orders', 'OrderController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
