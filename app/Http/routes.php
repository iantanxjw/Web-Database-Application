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
Route::get("contact", ["as" => "contact", "uses" => "PageController@contact"]);
Route::get("test", ["as" => "test", "uses" => "PageController@test"]);

// Admin panel
Route::get("admin", ["as" => "admin", "uses" => "AdminController@index"]);
Route::get("add_movie", ["as" => "add_movie", "uses" => "AdminController@add_movie"]);
Route::get("remove_movie", ["as" => "remove_movie", "uses" => "AdminController@remove_movie"]);
Route::get("add_session", ["as" => "add_session", "uses" => "AdminController@add_session"]);
Route::get("remove_session", ["as" => "remove_session", "uses" => "AdminController@remove_session"]);
Route::get("api_refresh", ["as" => "api_refresh", "uses" => "AdminController@api_refresh"]);