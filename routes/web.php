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

Route::feeds();

Route::get('/', 'SnippetsController@index')->name('home');
Route::get('/snippets/{tag}', 'TagsController@show')->name('tag.show')->multiformat();
Route::get('/search', 'PersonsController@show')->name('person.show');
Route::get('about', 'PagesController@about')->name('about');
Route::get('contribute', 'ContributionsController@create')->name('contribute.create');
Route::post('contribute', 'ContributionsController@store')->name('contribute.store');

/*Route::post('/newsletter-signup', 'NewsletterController@signup')->name('newsletter.signup');*/

// Only for admins
Route::group(['middleware' => 'auth'], function () {
    Route::get('create', 'SnippetsController@create')->name('snippet.create');
    Route::post('fetch-tweet', 'SnippetsController@fetchTweet');
    Route::post('store-snippet', 'SnippetsController@store');
    Route::get('contributions', 'ContributionsController@index')->name('contribute.index');
    Route::post('store-snippet-info', 'ContributionsController@storeSnippetInfo')->name('storeSnippetInfo');
});

Auth::routes(['register' => false]);

//Route::feeds();

//Route::get('/home', function() {
//    return redirect()->route('home');
//});
//
//Route::get('/register', function() {
//    return redirect()->route('home');
//});
