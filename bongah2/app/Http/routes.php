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




//
//
//// Authentication Routes...
//$this->get('login', 'Auth\AuthController@showLoginForm');    show
//$this->post('login', 'Auth\AuthController@login');
//$this->get('logout', 'Auth\AuthController@logout');
//
//// Registration Routes...
//$this->get('register', 'Auth\AuthController@showRegistrationForm');
//$this->post('register', 'Auth\AuthController@register');
//
//// Password Reset Routes...
//$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//$this->post('password/reset', 'Auth\PasswordController@reset');
//
//



















Route::auth();

    Route::get('info/{user}','InfoController@index')->name('showBanner');//show notes to a certain card (show)

Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('profile', 'UserController@show')->name('show');
    Route::get('{user}/edit', 'UserController@edit')->name('edit');//{user} use in tag <a
    Route::patch('notImportName', 'UserController@update')->name('update');
    Route::post('{id}','UserController@destroy')->name('destroy');


});

Route::get('register/confirm/{token}','Auth\AuthController@confirmEmail');

Route::get('/','PagesController@home');
//

Route::resource('banners','BannersController');

Route::get('{zip}/{street}','BannersController@show');
//-----------------------------------------------------
Route::post('{zip}/{street}/photos',[
    'as'   =>'store_photo_path',
    'uses' => 'PhotoController@store']);
//----------------------------------------------------
//Route::post('{zip}/{street}/photos','BannersController@addPhotos')->name('addPhotos');

//----------------------------------------------------
Route::post('/photos/{id}','PhotoController@destroy');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


//Route::auth();
//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/cards/{card}','CardsController@show');//show notes to a certain card (show)

