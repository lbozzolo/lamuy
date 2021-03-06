<?php

Auth::routes();

//Route::resource('magazines', 'MagazineController', ['only' => ['index', 'show']]);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', [
        'as' => 'admin',
        'uses' => 'HomeController@index'
    ]);

    // Sidebar Web

    Route::resource('users', 'UserController');


    // Editions

    Route::resource('editions', 'EditionController');

    Route::get('editions/index/list-table', [
        'as' => 'editions.index.table',
        'uses' => 'EditionController@indexTable'
    ]);

    Route::delete('ediciones/cover/eliminar-portada/{id}', [
        'as' => 'delete.cover',
        'uses' => 'EditionController@deleteCover'
    ]);

    Route::delete('ediciones/pdf/eliminar-pdf/{id}', [
        'as' => 'delete.pdf',
        'uses' => 'EditionController@deletePdf'
    ]);

    Route::resource('images', 'ImageController');

    // Imágenes

    Route::get('imagenes/{file}', [
        'as' => 'imagenes.ver',
        'uses' => 'ImageController@verImage'
    ]);

    Route::get('cover/{file}', [
        'as' => 'cover.ver',
        'uses' => 'ImageController@verCover'
    ]);

//    Route::get('pdf/{file}', [
//        'as' => 'pdf.ver',
//        'uses' => 'ImageController@verPdf'
//    ]);

    Route::get('social&medias', [
        'as' => 'images.index',
        'uses' => 'ImageController@index'
    ]);

    Route::post('imagenes/{id}/{class}', [
        'as' => 'images.save',
        'uses' => 'ImageController@storeImage'
    ]);

    Route::post('imagenes/store', [
        'as' => 'images.store',
        'uses' => 'ImageController@store'
    ]);

    Route::post('/{id}/{class}/demos/jquery-image-upload', [
        'as' => 'subir.imagen',
        'uses' => 'ImageController@saveJqueryImageUpload'
    ]);

    Route::post('/{type}/demos/jquery-image-upload', [
        'as' => 'subir.imagen.sin.modelo',
        'uses' => 'ImageController@saveWithoutModel'
    ]);

    Route::get('imagenes/{id}/{class}/{imagen}/principal', [
        'as' => 'images.main',
        'uses' => 'ImageController@principalImage',
    ]);

    Route::get('sliders/{id}/activate', [
        'as' => 'sliders.activate',
        'uses' => 'SliderController@activate'
    ]);

    Route::get('pdf/{file}', [
        'as' => 'pdf.ver',
        'uses' => 'ImageController@verPdf'
    ]);

});

