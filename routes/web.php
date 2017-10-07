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

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/profile', 'AccountController@index');
    Route::get('/profile/edit', 'AccountController@edit');
    Route::patch('/profile/edit', 'AccountController@update');
    Route::get('/profile/password','AccountController@password');
    Route::patch('/profile/password','AccountController@updatePassword');
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/announcements', 'AnnouncementController@index');

    Route::get('/events', 'EventController@index');
    Route::get('/events/calendar', 'EventController@calendar');
    Route::get('/events/create', 'EventController@create');
    Route::post('/events/create', 'EventController@store');
    Route::get('/events/{id}', 'EventController@show');
    Route::post('/events/{id}', 'EventCommentController@store');
    Route::post('/events/{id}/vote', 'EventController@vote');

    Route::get('/suggestions', 'SuggestedEventController@index');
    Route::get('/suggestions/mysuggestions', 'SuggestedEventController@show');

    Route::get('/organizations','OrganizationController@index');

    Route::delete('/accounts/delete','AccountController@destroy')->middleware('superadmin');

    Route::group(['namespace'=>'Admin', 'middleware'=>'superadmin'], function (){
        Route::get('/accounts/','AccountController@index');
        Route::get('/accounts/create','AccountController@create');
        Route::post('/accounts/create','AccountController@store');
        Route::get('/accounts/{user}','AccountController@show');
        Route::get('/accounts/{user}/edit','AccountController@edit');
        Route::patch('/accounts/{user}/edit','AccountController@update');

    });

});

Route::middleware('notVerified')->group(function(){
    Route::get('/verify', 'AccountVerificationController@verify');
    Route::post('/verify', 'AccountVerificationController@resendVerification');
    Route::get('/verify/{token}', 'AccountVerificationController@verifyAccount');
});
