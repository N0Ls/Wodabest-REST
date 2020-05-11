<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Home
Route::get('api/home/init', ['uses' => 'API\HomeController@init', 'as' => 'api/home/init']);

// Game
Route::get('api/game/init', ['uses' => 'API\GameController@init', 'as' => 'api/game/init']);
Route::put('api/game/update', ['uses' => 'API\GameController@update', 'as' => 'api/game/update']);

// Image
Route::get('api/images/showAll', ['uses' => 'API\ImageController@showAll', 'as' => 'api/images/showAll']);
Route::get('api/images/ranking/showRanked', ['uses' => 'API\ImageController@showRanked', 'as' => 'api/images/ranking/showRanked']);
Route::get('api/images/user/showUser', ['uses' => 'API\ImageController@showUser', 'as' => 'api/images/user/showUser']);
Route::get('api/images/show/{image_id}', ['uses' => 'API\ImageController@show', 'as' => 'api/images/show/{image_id}']);
Route::get('api/images/edit/{image_id}', ['uses' => 'API\ImageController@edit', 'as' => 'api/images/edit/{image_id}']);
Route::put('api/images/update/{image_id}', ['uses' => 'API\ImageController@update', 'as' => 'api/images/update/{image_id}']);
Route::get('api/images/upload/upload', ['uses' => 'API\ImageController@upload', 'as' => 'api/images/upload/upload']);
Route::post('api/images/upload/store', ['uses' => 'API\ImageController@store', 'as' => 'api/images/upload/store']);

//Route::delete('api/images/delete/{image_id}', ['uses' => 'API\ImageController@delete', 'as' => 'api/images/delete/{image_id}']);
