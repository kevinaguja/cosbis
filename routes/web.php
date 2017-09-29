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

Route::get('/home', function () {
    return redirect()->home();
});

Auth::routes();

//Route::middleware(['auth'])->group(function(){
//});

Route::middleware('auth')->group(function(){
    Route::get('/profile', 'AccountController@index');
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/events', 'EventController@index');
    Route::get('/events/create', 'EventController@create');
    Route::post('/events/create', 'EventController@store');

    Route::get('/events/{id}', 'EventController@show');

    Route::get('/suggestions', 'SuggestedEventController@index');
    Route::get('/suggestions/mysuggestions', 'SuggestedEventController@show');
});

Route::get('try', function(){
    dd(request()->all());
});