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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');

// Route::get('/home', 'ProductController@home')->name('home');
// Route::post('/search', 'ProductController@search')->name('search');
// Route::get('/{id}/showComments', 'ProductController@showComments')->name('showComments');
// Route::post('/addComment', 'ProductController@addComment')->name('addComment');

// Route::get('/like/{id}' ,'ProductController@like')->name('like');

Route::get('/{user}/edit', 'UserController@edit')->name('user.edit');
Route::put('/{user}/update', 'UserController@update')->name('user.update');
Route::delete('/{post}/delete', 'UserController@delete')->name('post.delete');
Route::post('/addComment', 'UserController@addComment')->name('addComment');
Route::get('/addComment', 'UserController@addComment')->name('addComment');
Route::get('/likePost/{id}' ,'UserController@likePost')->name('likePost');
Route::get('/likeComment/{id}' ,'UserController@likeComment')->name('likeComment');
Route::get('/news' ,'UserController@news')->name('news');
Route::post('/storePost' ,'UserController@storePost')->name('storePost');
Route::post('/storeFeedback' ,'UserController@storeFeedback')->name('storeFeedback');

Route::get('/feedback' ,'UserController@feedback')->name('feedback');
Route::get('/notes' ,'UserController@notes')->name('notes');
Route::post('/storeNote' ,'UserController@storeNote')->name('storeNote');
Route::delete('/{note}/deleteNote', 'UserController@deleteNote')->name('note.delete');
//Route::get('/post_report/{post_id}' ,'UserController@report_post')->name('post.report');


Route::get('/followers' ,'UserController@followers')->name('followers');

Route::get('/admin' ,'AdminController@index')->name('admin');

Route::get('/following' ,'UserController@following')->name('following');
Route::post('/search', 'UserController@search')->name('search');