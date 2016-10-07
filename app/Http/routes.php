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

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::get("/", ["as" => "index", "uses" => "PageController@index"]);
Route::auth();
Route::get("register", ["as" => "register", "uses" => "PageController@register"]);
Route::get("about", ["as" => "about", "uses" => "PageController@about"]);
Route::get("search", ["as" => "search", "uses" => "PageController@search"]);
Route::get("contact", ["as" => "contact", "uses" => "PageController@contact"]);
Route::get("icons", ["as" => "icons", "uses" => "PageController@icons"]);
Route::get("form", ["as" => "form", "uses" => "PageController@form"]);
Route::post("test", ["as" => "test", "uses" => "PageController@test"]);

// Admin panel
Route::get("admin", ["as" => "admin", "uses" => "AdminController@index"]);
Route::get("api_refresh", ["as" => "api_refresh", "uses" => "AdminController@api_refresh"]);
Route::post("updatedb", "AdminController@updateAPI");

Route::get("manage_movies", ["as" => "admin_movies", "uses" => "AdminController@movies"]);
Route::get("manage_sessions", ["as" => "admin_sessions", "uses" => "AdminController@sessions"]);
Route::get("manage_users", ["as" => "admin_users", "uses" => "AdminController@users"]);
Route::get("manage_locations", ["as" => "admin_locations", "uses" => "AdminController@locations"]);

Route::resource('admin_sessions','SessionsController');
Route::resource('admin_locations','TheatresController');
Route::resource('admin_users','UsersController');

// AJAX requests
Route::get("api_request", "ClientRequests@ajax");