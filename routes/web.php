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
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', ['middleware' => 'auth', function () {
    return view('home');
}]);

Route::group(['prefix' => 'categorias', 'middleware' => 'auth'], function() {
    Route::get('new', function(){
        return view('categoria.form_categoria');
    });
    Route::post('/', 'CategoriaController@store');
    Route::get('list', function(){
       return view('categoria.lista_categoria'); 
    });
    Route::get('/', 'CategoriaController@showAll');
    Route::get('/{id}/edit', function(){
       return view('categoria.form_categoria');  
    });
    Route::get('/{id}', 'CategoriaController@show');
    Route::put('/{id}/edit', 'CategoriaController@update');
    Route::delete('/{id}', 'CategoriaController@destroy');
});





//Route::get('/home', 'HomeController@index');
