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


Route::get('/', 'PhoneBookController@index')->name('phonebook.index');
Route::get('/search', 'PhoneBookController@search')->name('phonebook.search');
Route::get('/create', 'PhoneBookController@create')->name('phonebook.create');
Route::post('/store', 'PhoneBookController@store')->name('phonebook.store');
Route::get('/{id}', 'PhoneBookController@show')->name('phonebook.show');
Route::get('/{id}/edit', 'PhoneBookController@edit')->name('phonebook.edit');
Route::put('/{id}', 'PhoneBookController@update')->name('phonebook.update');
Route::delete('/{id}', 'PhoneBookController@destroy')->name('phonebook.destroy');