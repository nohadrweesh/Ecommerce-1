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
Route::get('/admin','AdminController@login');
Route::get('/logout','AdminController@logout');
Route::post('/admin','AdminController@doLogin');
Route::group(['middleware'=>['auth']],function (){
    Route::get('/admin/dashboard','AdminController@viewDashboard');
    Route::get('/admin/settings','AdminController@viewSettings');
    Route::get('/admin/check-pwd','AdminController@checkPwd');
    Route::post('/admin/update-pwd','AdminController@updatePwd');

    Route::resource('/admin/product','ProductController');
    Route::resource('/admin/category','CategoryController');
    Route::get('/admin/delete-category/{id}','CategoryController@destroy');
    Route::get('/admin/delete-product/{id}','ProductController@destroy');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
