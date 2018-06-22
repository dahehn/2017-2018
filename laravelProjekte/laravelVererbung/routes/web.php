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



Route::get('ProjectUser','ProjectUserController@index')->name('display');
Route::get('ProjectUser/create','ProjectUserController@create')->name('create');
Route::post('ProjectUser','ProjectUserController@store')->name('store');
Route::delete('ProjectUser/delete/{ProjectUser}', 'ProjectUserController@destroy')->name('projectUser.destroy');

Route::get('ProjectUser/{ProjectUser}','ProjectUserController@show')->name('show');
Route::get('ProjectUser/edit/{ProjectUser}','ProjectUserController@edit')->name('edit');
Route::patch('ProjectUser/update/{ProjectUser]','ProjectUserController@update')->name('update');