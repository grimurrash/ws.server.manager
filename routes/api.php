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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login','Auth\LoginController@login');
Route::post('/register','Auth\RegisterController@register');

Route::middleware('auth')->prefix('projects')->group(function (){
    Route::get('/','ProjectController@index');
    Route::middleware('auth:manager')->group(function (){
        Route::post('/','ProjectController@store');
    });
    Route::get('/{project}','ProjectController@show');

    Route::get('/{project}/task','TaskController@index');
    Route::post('/{project}/task','TaskController@store');
    Route::post('/task/{task}','TaskController@show');
    Route::get('/task/{task}/comments','CommentController@index');
    Route::post('/task/{task}/comments','CommentController@store');
});