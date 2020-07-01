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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// All GET routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test', 'HomeController@testCandidate')->name('start-test');

// All POST routes
Route::post('/test/post', 'HomeController@checkScore')->name('check-score');
Route::post('/recommend/post', 'VideoController@getVideo')->name('video');