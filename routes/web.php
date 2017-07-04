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

Route::get('/', 'Museum\MainController');
Route::get('/exhibit/{id}', 'Museum\ExhibitController');

// Изменение локали
Route::get('lang/{locale}', ['as'=>'lang', 'uses'=>'LangController@switchLang']);

// Страница админ панели
Route::get('admin', 'AdminPanel\AdminController');
