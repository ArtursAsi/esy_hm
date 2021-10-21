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

Route::get('/home', 'ProductController@index')->name('product.index');
Route::post('/home/product', 'ProductController@store')->name('product.store');
Route::get('/home/product', 'ProductController@create')->name('product.create');
Route::get('/home/{product}', 'ProductController@show')->name('product.show');
Route::get('/home/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::patch('/home/{product}/update', 'ProductController@update')->name('product.update');
Route::delete('/home/{product}/delete', 'ProductController@destroy')->name('product.destroy');
