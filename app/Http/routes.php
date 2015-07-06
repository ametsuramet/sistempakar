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
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', 'masterController@index');
Route::get('peneliti', 'frontendController@peneliti');
Route::get('spesifik', 'frontendController@spesifik');
Route::get('digit2', 'frontendController@digit2');
Route::get('digit3', 'frontendController@digit3');
Route::get('jabatan', 'frontendController@jabatan');
Route::get('pangkat', 'frontendController@pangkat');
Route::get('search', 'frontendController@search');

Route::group(['middleware'=>'auth'],function(){

	Route::group(['prefix'=>'admin'],function(){

		Route::get('tambahjabatan', 'backendController@tambahjabatan');
		Route::post('tambahjabatan', 'backendController@tambahjabatanproses');

		Route::get('tambahpangkat', 'backendController@tambahpangkat');
		Route::post('tambahpangkat', 'backendController@tambahpangkatproses');

		Route::get('tambahpeneliti', 'backendController@tambahpeneliti');
		Route::post('tambahpeneliti', 'backendController@tambahpenelitiproses');


		Route::get('tambahdigit2', 'backendController@tambahdigit2');
		Route::post('tambahdigit2', 'backendController@tambahdigit2proses');

		Route::get('tambahdigit3', 'backendController@tambahdigit3');
		Route::post('tambahdigit3', 'backendController@tambahdigit3proses');

		Route::get('tambahspesifik', 'backendController@tambahspesifik');
		Route::post('tambahspesifik', 'backendController@tambahspesifikproses');
		Route::get('delete', 'backendController@delete');

		Route::get('user', 'backendController@user');
		Route::get('tambahuser', 'backendController@tambahuser');
		Route::post('tambahuser', 'backendController@tambahuserproses');

		Route::get('ajaxSpesifik', 'backendController@ajaxSpesifik');
	});
});

