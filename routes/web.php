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


Route::get('signup','AuthController@signup');
Route::post('signme','AuthController@signme');
Route::get('/','AuthController@index');
Route::post('login','AuthController@login');
Route::get('logout','AuthController@logout');

Route::group(['Middleware'=>'Auth'],function() 
{
	Route::get('userprofile', function () {
        return view('userprofile');
    });
    

//Route::get('userprofile','AuthController@userprofile');
});

