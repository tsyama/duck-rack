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

Route::get('/', 'HomeController@index');
Route::get('/user/login', 'UsersController@login');
Route::get('/user/callback', 'UsersController@callback');
Route::get('/answers/{answer}/preview', 'AnswersController@preview');

Route::group(['middleware' => ['auth', 'can:general']], function() {
    Route::resource('/answers', 'AnswersController');
    Route::get('/users/config', 'UsersController@config');
    Route::post('/users/config', 'UsersController@configUpdate');
    Route::get('/logout', 'UsersController@logout');
});

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::resource('/admin/questions', 'Admin\QuestionsController');
    Route::resource('/admin/users', 'Admin\UsersController');
});
