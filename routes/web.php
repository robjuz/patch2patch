<?php

use App\Patchwork;
use App\Fabric;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function(){
    return view('create')->with('fabrics', Fabric::get());
});

Route::get('/galeria', 'GalleryController@index')->name('gallery');

Route::get('/galeria/{patchwork}', 'GalleryController@show')->name('single-patchwork');

Route::resource('patchwork', 'PatchworkController', ['except' => [
    'create', 'edit'
]]);
