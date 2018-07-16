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

Route::get('/products/{id}', 'ProductController@show'); //mostrar un producto

//============================================PEDIDOS
Route::middleware(['auth'])->group(function(){
    Route::get('/order', 'OrderController@index'); //vaciar el carrito
});





//==============================detalles del Carrito
Route::post('/cart', 'CartDetailController@store'); //almacena un elemento en el carrito
Route::delete('/cart/{id}', 'CartDetailController@delete'); //elimina un elemento del carrito

//==============================Carrito
Route::get('/vaciar_carrito', 'CartController@vaciar'); //vaciar el carrito
Route::post('/pedido_pendiente', 'CartController@pedido_pendiente'); //convierte el carrito en un pedido


Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function(){
    //==================================================================================================================CRUD productos
    //CR (Create & Read)
    Route::get('/products', 'ProductController@index'); //listar
    Route::get('/products/create', 'ProductController@create'); //formulario de registro
    Route::post('/products', 'ProductController@store'); //almacenar el producto

    //UD (Update & Delete)

    Route::get('/products/edit/{product}', 'ProductController@edit'); //editar producto
    Route::post('/products/update/{product}', 'ProductController@update'); //guardar cambios producto

    Route::delete('/products/{product}', 'ProductController@delete'); //eliminar producto
    
    Route::get('/products/images/{id}', 'ImageController@index'); //listar imagenes
    Route::post('/products/images/{id}', 'ImageController@store'); //almacenar imagenes
    Route::delete('/products/images/{id}', 'ImageController@delete'); //guardar cambios producto

    Route::get('/products/images/select/{id}/{image_id}', 'ImageController@destacar_imagen'); //destacar imagen
    
    //==================================================================================================================CRUD categorias
    //CR (Create & Read)
    Route::get('/categories', 'CategoryController@index'); //listar categorias
    Route::get('/categories/create', 'CategoryController@create'); //formulario de registro de categorias
    Route::post('/categories', 'CategoryController@store'); //almacenar categoria

    //UD (Update & Delete)

    Route::get('/categories/edit/{category}', 'CategoryController@edit'); //editar categoria
    Route::post('/categories/update/{category}', 'CategoryController@update'); //guardar cambios categoria

    Route::delete('/categories/{category}', 'CategoryController@delete'); //eliminar categoria
    
});







