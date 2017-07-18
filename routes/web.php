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

Route::get('/', 'Museum\PageController@main')->name('main');

Route::get('/exhibit/{id}', 'Museum\PageController@exhibit');

// Изменение локали
Route::get('lang/{locale}', 'LangController@switchLang')->name('lang');

// Страница админ панели
Route::get('admin', 'AdminPanel\AdminController')->middleware('guest');

Route::get('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');
Route::post('authenticate', 'Auth\AuthController@authenticate')->name('authenticate');
Route::post('create', 'Auth\AuthController@create')->name('create');
