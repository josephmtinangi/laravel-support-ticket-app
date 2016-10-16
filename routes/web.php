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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('new-ticket', 'TicketController@create');
Route::post('new-ticket', 'TicketController@store');
Route::get('my-tickets', 'TicketController@userTicket');
Route::get('tickets/{id}', 'TicketController@show');

Route::post('comment', 'CommentController@postComment');

Route::group([
	'middleware'	=> 'admin'
], function() {
	Route::get('tickets', 'TicketController@index');
	Route::post('close-ticket', 'TicketController@closeTicket');
});