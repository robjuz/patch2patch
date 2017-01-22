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
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
], function() {

    Route::get('/', function () {
        return view('homepage');
    });

    Route::resource('patchwork', 'PatchworkController', ['except' => 'show']);
    Route::get('patchwork/{patchwork}{slug?}', 'PatchworkController@show')->name('patchwork.show');
    Route::post('patchwork/{patchwork}/like', 'PatchworkController@like')->name('patchwork.like');

    Route::resource('comment', 'CommentController', ['only' => [
        'index', 'store',
    ]]);

    Route::get('/about-us', function () {
        return view('about-us');
    })->name('about-us');
});