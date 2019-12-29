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

Route::get('/', 'OpenController@home');

Auth::routes();

Route::get('/admin','OpenController@adminHome');
Route::get('/admin-register','OpenController@register');
Route::get('/unauth','OpenController@unauth');


Route::get('/home','HomeController@index');
Route::get('/showRooms','OpenController@showRooms');

Route::get('/student/profile','ProfileController@show');
Route::PATCH('/student/profile','ProfileController@update');
Route::get('/student/apply','ProfileController@apply');
Route::post('/student/apply','ProfileController@addApply');

Route::get('/admin/pending','AdminController@pending');
Route::get('/admin/manage-admin','AdminController@manageAdmin');
Route::get('/admin/manage-student','AdminController@manageStudent');
Route::get('/admin/add-room','AdminController@showAddRoom');
Route::post('/admin/add-room','AdminController@addRoom');
Route::post('/admin/accept/{userId}','AdminController@accept');
Route::post('/admin/reject/{userId}','AdminController@reject');
Route::post('/admin/block/{userId}','AdminController@block');
Route::get('/admin/getUser/{userId}',function ($userId){
    $data = \App\User::find($userId);
    $data_more = \App\User::find($userId)->StudentProfile;
    $data = array_merge([
        $data,
        $data_more
    ]);
    return $data;
});
