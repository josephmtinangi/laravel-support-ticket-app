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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('new-ticket', 'TicketController@create');
Route::post('new-ticket', 'TicketController@store');
Route::get('my-tickets', 'TicketController@index');
Route::get('tickets/{id}', 'TicketController@show');

Route::post('comment', 'CommentController@postComment');