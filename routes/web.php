<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Home
Route::get('/home', ['uses' => 'Actions\HomeAction@home', 'as' => 'home']);

// Game
Route::get('/game', ['uses' => 'Actions\GameAction@game', 'as' => 'game']);

// Image
Route::get('/images', ['uses' => 'Actions\ImageAction@showAll', 'as' => 'images']);
Route::get('/images/ranking', ['uses' => 'Actions\ImageAction@showRanked', 'as' => 'ranking']);
Route::get('/images/user', ['uses' => 'Actions\ImageAction@user', 'as' => 'user']);
Route::get('/images/{id}/show', ['uses' => 'Actions\ImageAction@show', 'as' => 'images/{id}/show']);

Route::get('/images/{id}/edit', ['uses' => 'Actions\ImageAction@edit', 'as' => 'edit']);

Route::get('/images/upload', ['uses' => 'Actions\ImageAction@upload', 'as' => 'upload']);