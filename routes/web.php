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

Route::get('/', 'TestController@readItems');
Route::post('addItem', 'TestController@addItem');
Route::post('editItem', 'TestController@editItem');
Route::post('deleteItem', 'TestController@deleteItem');
