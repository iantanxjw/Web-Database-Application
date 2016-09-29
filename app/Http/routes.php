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