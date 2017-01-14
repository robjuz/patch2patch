<?php


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

Route::get('/', function() {
  return view('homepage');
});

Route::resource('patchwork', 'PatchworkController');

Route::resource('comment', 'CommentController', ['only' => [
    'index', 'store',
]]);

Route::get('/about-us', function(){
  return view('about-us');
})->name('about-us');
