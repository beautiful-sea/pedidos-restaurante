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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'pedidos'],function(){

});

Route::group(['prefix'=>'clientes'],function(){

});

Route::group(['prefix'=>'bairros'],function(){

});

Route::group(['prefix'=>'marmitas'],function(){
});

route::resource('/pedidos','PedidosController');
route::resource('/clientes','ClientesController');
route::resource('/bairros','BairrosController');
route::resource('/marmitas','MarmitexController');

\AgenciaMaior\LaravelBoilerplate\LaravelBoilerplateServiceProvider::routes();