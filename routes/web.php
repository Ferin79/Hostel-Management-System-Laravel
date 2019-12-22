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

Auth::routes();

Route::get('/student/profile','ProfileController@show');
Route::PATCH('/student/profile','ProfileController@update');

Route::get('/home','HomeController@index');

Route::get('/admin/register','AdminController@register');
Route::get('/admin/pending','AdminController@pending');
Route::get('/admin/manage-admin','AdminController@manageAdmin');
Route::get('/admin/manage-student','AdminController@manageStudent');

Route::post('/admin/accept/{userId}','AdminController@accept');
Route::post('/admin/reject/{userId}','AdminController@reject');
Route::post('/admin/block/{userId}','AdminController@block');
