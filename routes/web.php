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

Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//CRUD
//CR (Create & Read)
Route::get('/admin/products', 'ProductController@index'); //listar
Route::get('/admin/products/create', 'ProductController@create'); //formulario de registro
Route::post('/admin/products', 'ProductController@store'); //almacenar el producto

//CR (Update & Delete)



