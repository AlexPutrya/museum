<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/exhibits', 'Api\ExhibitsController@get_exhibits');
Route::get('/exhibit/{id}', 'Api\ExhibitsController@get_exhibit');
Route::post('/exhibit', 'Api\ExhibitsController@create');
Route::delete('/exhibit/{id}', 'Api\ExhibitsController@delete');
Route::patch('/exhibit/{id}', 'Api\ExhibitsController@edit');
Route::patch('/exhibit/{id}/visibility', 'Api\ExhibitsController@visibility');

Route::post('/exhibit/{id}/image', 'Api\ImageController@save');
Route::delete('/exhibit/{id}/image', "Api\ImageController@delete");
