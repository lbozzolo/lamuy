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

require(__DIR__ . '/admin.php');

Route::get('/', function () {
  return redirect('home');
});


Route::group(['prefix' => 'web'], function () {

    Route::get('/', [
        'as' => 'home',
        'uses' => 'WebController@index'
    ]);

    Route::get('empresa', [
        'as' => 'web.empresa',
        'uses' => 'WebController@empresa'
    ]);

    Route::get('servicios', [
        'as' => 'web.servicios',
        'uses' => 'WebController@servicios'
    ]);

    Route::get('proyectos', [
        'as' => 'web.proyectos',
        'uses' => 'WebController@proyectos'
    ]);

    Route::get('proyectos/{id}/detalle', [
        'as' => 'web.proyectos.detalle',
        'uses' => 'WebController@detalleProyecto'
    ]);

    Route::get('eventos', [
        'as' => 'web.eventos',
        'uses' => 'WebController@eventos'
    ]);

    Route::get('eventos/{id}/detalle', [
        'as' => 'web.eventos.detalle',
        'uses' => 'WebController@detalleEvento'
    ]);

    Route::get('equipamiento', [
        'as' => 'web.equipamiento',
        'uses' => 'WebController@equipamiento'
    ]);

    Route::get('equipamiento/{id}/detalle', [
        'as' => 'web.equipamiento.detalle',
        'uses' => 'WebController@detalleEquipamiento'
    ]);

    Route::get('contacto', [
        'as' => 'web.contacto',
        'uses' => 'WebController@contacto'
    ]);

    Route::post('contacto', [
        'as' => 'web.post.contacto',
        'uses' => 'WebController@postContacto'
    ]);

    Route::get('/home', 'WebController@index');

});




