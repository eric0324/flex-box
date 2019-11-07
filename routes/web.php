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

Auth::routes(['verify' => true]);

Route::get('/', 'FlexController@index')->name('index');
Route::get('/flex/create', 'FlexController@create')->name('flex.create')->middleware('verified');
Route::get('/flex/{demo_code}', 'FlexController@show')->name('flex.show');
Route::post('/flex', 'FlexController@store')->name('flex.store')->middleware('verified');

Route::post('/line/webhook', 'LineController@webhook');
