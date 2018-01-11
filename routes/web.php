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
Route::get('/suspendedaccount', 'AccountController@suspendedAccount');

Auth::routes();

//Route::middleware(['auth'])->group(function(){
//});

Route::middleware(['auth', 'verified', 'active'])->group(function () {
    Route::group(['namespace' => 'Admin', 'middleware' => 'superadmin'], function () {
        Route::get('/accounts/create', 'AccountController@create');
        Route::post('/accounts/create', 'AccountController@store');
        Route::delete('/accounts/delete', 'AccountController@destroy');
    });

    Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function () {
        Route::get('/accounts/', 'AccountController@index');
        Route::get('/accounts/{user}', 'AccountController@show');
        Route::get('/accounts/{user}/edit', 'AccountController@edit');
        Route::patch('/accounts/{user}/edit', 'AccountController@update');
        Route::patch('/accounts/{user}/suspend', 'AccountController@suspend');
        Route::get('/election/candidates/create', 'Election\CandidateController@create');
        Route::post('/election/candidates/create', 'Election\CandidateController@store');
        Route::get('/election/candidates/{id}/edit', 'Election\CandidateController@edit');
        Route::delete('/election/candidates/{candidate}/delete', 'Election\CandidateController@destroy');
        Route::patch('/election/candidates/{candidate}/edit', 'Election\CandidateController@update');
        Route::get('/election/parties/create', 'Election\PartyController@create');
        Route::post('/election/parties/create', 'Election\PartyController@store');
        Route::get('/election/parties/{id}/edit', 'Election\PartyController@edit');
        Route::patch('/election/parties/{id}/edit', 'Election\PartyController@update');
        Route::delete('/election/parties/{party}/delete', 'Election\PartyController@destroy');
        Route::get('/election', 'Election\ElectionController@index');
    });

    Route::get('/profile', 'AccountController@index');
    Route::get('/profile/edit', 'AccountController@edit');
    Route::patch('/profile/edit', 'AccountController@update');
    Route::get('/profile/password', 'AccountController@password');
    Route::patch('/profile/password', 'AccountController@updatePassword');
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/announcements', 'AnnouncementController@index');

    Route::delete('/events/{event}/delete', 'EventController@destroy')->middleware('admin');
    Route::get('/events', 'EventController@index');
    Route::get('/events/calendar', 'EventController@calendar');
    Route::get('/events/create', 'EventController@create');
    Route::post('/events/create', 'EventController@store');
    Route::get('/events/{id}', 'EventController@show');
    Route::post('/events/{id}', 'EventCommentController@store');
    Route::post('/events/{id}/vote', 'EventController@vote');

    Route::get('/suggestions', 'SuggestedEventController@index');
    Route::get('/suggestions/mysuggestions', 'SuggestedEventController@show');

    Route::get('/organizations', 'OrganizationController@index');
    Route::get('/organizations/{organization}', 'OrganizationController@show');

    Route::get('/election/vote', 'ElectionController@index');
    Route::post('/election/vote', 'ElectionController@store');

    Route::get('/messages', 'ReportsController@index');
    Route::post('/messages', 'ReportsController@store');
    Route::patch('/messages', 'ReportsController@markAsRead');
});

Route::middleware('notVerified')->group(function () {
    Route::get('/verify', 'AccountVerificationController@verify');
    Route::post('/verify', 'AccountVerificationController@resendVerification');
    Route::get('/verify/{token}', 'AccountVerificationController@verifyAccount');
});

Route::get('/test', 'accountController@test');