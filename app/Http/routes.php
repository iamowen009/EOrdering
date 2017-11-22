<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('customer','CustomerController@index');
Route::get('profile','CustomerController@profile');
Route::get('contact','CustomerController@contact');
Route::get('profile-update','CustomerController@profile_update');
Route::get('problem', 'CustomerController@problem');
Route::get('store','CustomerController@store');
Route::get('password-update','CustomerController@password_update');
Route::get('forgot-password','CustomerController@forgot_password');
Route::get('forgotconf-password','CustomerController@forgotconf_password');
Route::get('recover-password','CustomerController@recover_password');

Route::get('home/{id?}','HomeController@index');

Route::get('cart','ProductCheckoutController@index');
Route::get('cart-summary/{id?}','ProductCheckoutController@summary');

Route::get('order','OrderController@index');

Route::get('documents','DocumentController@index');

Route::get('product-history','ProductHistoryController@index');

Route::get('favorite','FavoriteController@index');

Route::get('news','NewsController@index');

Route::get('news/{id?}','NewsController@category');

Route::get('report','ReportController@index');

Route::get('product/{id?}','ProductController@index');
Route::get('product-detail/{id?}','ProductController@detail');

Route::get('promotion/{id?}','PromotionController@index');

Route::get('mail', 'HomeController@mail');

Route::group(['prefix' => 'print'], function() {
	Route::get('/invoice/{orderId}', 'PrintController@invoice');
});

/*Route::get('/sendmail', function() 
{
	$data = array('name' => 'Jordan');
	
	Mail::send('emails.mailExample', $data, function($message)
	{
		$message->to('piigabo.oc@gmail.com')
		->subject('Hi there!  Laravel sent me!');
	});
});*/