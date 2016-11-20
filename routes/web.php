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

Route::get('/', 'PatchworkController@create');

Route::resource('patchwork', 'PatchworkController', ['except' => [
    'create'
]]);
