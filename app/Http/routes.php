<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/", ["as" => "index", "uses" => "PageController@index"]);
Route::auth();
Route::get("register", ["as" => "register", "uses" => "PageController@register"]);
Route::get("search", ["as" => "search", "uses" => "PageController@search"]);
Route::get("icons", ["as" => "icons", "uses" => "PageController@icons"]);
Route::get("form", ["as" => "form", "uses" => "PageController@form"]);
Route::post("summary", ["as" => "summary", "uses" => "PageController@summary"]);
Route::get("bookings" , ["as" => "bookings", "uses" => "TicketController@bookings"]);

// Wishlist
Route::resource('WishlistCRUD','WishlistController');

// Admin panel
Route::get("api_refresh", ["as" => "api_refresh", "uses" => "AdminController@api_refresh"]);
Route::post("updatedb", "AdminController@updateAPI");
Route::resource('admin_sessions','SessionsController');
Route::resource('admin_theatres','TheatresController');
Route::resource('admin_users','UsersController');
Route::resource('admin_movies','MoviesController');
Route::resource('bookings','BookingsController');
Route::resource('booking_tickets','TicketController');

// AJAX requests
Route::get("api_request", "ClientRequestsController@ajax");
Route::get("movieid", "ClientRequestsController@getMovieByID");
Route::get("movietitle", "ClientRequestsController@getMovieByTitle");
Route::get("searchmovies", "ClientRequestsController@searchForMovies");
Route::get("movieidsessions", "ClientRequestsController@getMovieIDSessions");
Route::get("theatresessions", "ClientRequestsController@getSessionsAtTheatre");
Route::get("sessiontheatre", "ClientRequestsController@getTheatreFromSession");
Route::get("theatres_available", "ClientRequestsController@getTheatres");
Route::get("locations", "ClientRequestsController@getLocationsForMovie");
Route::get("theatremovies", "ClientRequestsController@getTheatreMovies");
Route::get("sessions", "ClientRequestsController@getSessionsForMovie");

