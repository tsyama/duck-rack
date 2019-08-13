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
Route::get('/logout', 'UsersController@logout');

Route::get('/admin/questions', 'Admin\QuestionsController@index');
Route::get('/admin/questions/create', 'Admin\QuestionsController@create');
Route::post('/admin/questions', 'Admin\QuestionsController@store');
Route::get('/admin/questions/{question}/edit', 'Admin\QuestionsController@edit');
Route::put('/admin/questions/{question}', 'Admin\QuestionsController@update');
Route::delete('/admin/questions/{question}', 'Admin\QuestionsController@destroy');
