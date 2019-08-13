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
Route::get('/ducks/create', 'DucksController@create');
Route::resource('/answers', 'AnswersController');
Route::get('/logout', 'UsersController@logout');

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::resource('/admin/questions', 'Admin\QuestionsController');
    Route::resource('/admin/users', 'Admin\UsersController');
});
