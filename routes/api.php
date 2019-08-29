<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

// we can group all our Parks routes together
$router->group(["prefix" => "parks"], function ($router) {

	$router->post("/", "Parks@store");
	//it gets the article index
	$router->get("/", "Parks@index");
    // {article} is a url parameter representing the id we want
    //get Parks route

	$router->get("{park}", "Parks@show");
    //editing route
	$router->put("{park}", "Parks@update");
    //delete park route
	$router->delete("{park}", "Parks@destroy");
	
	//the 1 to many route setup for sport post this stays in here as its sport are linked to the park
	$router->post("{park}/sports", "Sports@store");
	//get sport post route this stays in here as its sport are linked to the park
	$router->get("{park}/sports", "Sports@index");
});

$router->group(["prefix" => "boroughs"], function ($router) {

	$router->post("/", "Boroughs@store");
	//it gets the borough index
	$router->get("/", "Boroughs@index");
    // {borough} is a url parameter representing the id we want

    //get Boroughs route
	$router->get("{borough}", "Boroughs@show");
    //editing route



	// boroughs id Url that lists all parks 
    $router->get("{borough}/parks", "Boroughs@index");
    




    /// NOT COMPLETED ////
	$router->put("{borough}", "Boroughs@update");
    //delete borough route
	$router->delete("{borough}", "Boroughs@destroy");		

});

$router->group(["prefix" => "sports"], function ($router) {

	$router->post("/", "sports@store");
	//it gets the borough index
	$router->get("/", "sports@index");
    // {borough} is a url parameter representing the id we want
    //get Boroughs route
	$router->get("{borough}", "sports@show");
    //editing route
	$router->put("{borough}", "Boroughs@update");
    //delete borough route
	$router->delete("{borough}", "Boroughs@destroy");		

});




