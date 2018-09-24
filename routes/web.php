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
//profile
Route::get('/account/profile', 'ProfileController@getProfile')->name('profile');
Route::get('/account/edit-profile', 'ProfileController@editProfile')->name('edit-profile');
//account
Route::get('/account/logo', 'AccountController@getLogo')->name('logo');
Route::get('/account/edit-email', 'AccountController@editEmail')->name('edit-email');
Route::get('/account/edit-password', 'AccountController@editPassword')->name('edit-password');
Route::get('/account/field', 'AccountController@getField')->name('field');
Route::get('/account/description', 'AccountController@getDescription')->name('description');
Route::get('/account/requisites', 'AccountController@getRequisites')->name('requisites');
Route::get('/account/notifications', 'AccountController@getNotifications')->name('notifications');
Route::get('/account/orders', 'AccountController@getOrders')->name('orders');
Route::get('/account/price', 'AccountController@getPrice')->name('price');
Route::get('/account/referal', 'AccountController@getReferal')->name('referal');
Route::get('/account/bill', 'AccountController@getBill')->name('bill');
Route::get('/account/documents', 'AccountController@getDocuments')->name('documents');
Route::get('/account/referal-partner', 'AccountController@getReferalPartner')->name('referal-partner');
Route::get('/account/payment', 'AccountController@getPayment')->name('payment');



//static pages
Route::get('/about', 'StaticController@getAbout')->name('about');
Route::get('/how-it-works', 'StaticController@getHowItWorks')->name('how-it-works');
Route::get('/feedback', 'StaticController@getFeedback')->name('feedback');
