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

Route::get('fanta', 'FantaController@index')->name('index-fanta');

Route::get('fanta/create', 'FantaController@create')->name('create-fanta')->middleware('auth');

Route::get('fanta/{fanta}', 'FantaController@show')->name('show-fanta');

Route::get('fanta/{fanta}/edit', 'FantaController@edit')->name('edit-fanta');

Route::post('fanta', 'FantaController@store')->name('store-fanta');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
