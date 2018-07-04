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

//Las rutas GET solo para obtener o consultar informacion
//Las rutas POST para modificar la base de datos (insertar, eliminar, editar) ya que usan el token csrf

Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function(){
    //CRUD productos
    //CR (Create & Read)
    Route::get('/products', 'ProductController@index'); //listar
    Route::get('/products/create', 'ProductController@create'); //formulario de registro
    Route::post('/products', 'ProductController@store'); //almacenar el producto

    //UD (Update & Delete)

    Route::get('/products/edit/{id}', 'ProductController@edit'); //editar producto
    Route::post('/products/update/{id}', 'ProductController@update'); //guardar cambios producto

    Route::delete('/products/{id}', 'ProductController@delete'); //guardar cambios producto

    Route::get('/products/images/{id}', 'ImageController@index'); //listar imagenes
    Route::post('/products/images/{id}', 'ImageController@store'); //almacenar imagenes
    Route::delete('/products/images/{id}', 'ImageController@delete'); //guardar cambios producto

    Route::get('/products/images/select/{id}/{image_id}', 'ImageController@destacar'); //destacar imagen




});







