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


Route::group(['middleware' => 'web'], function (){

    Route::get('/','UserController@index');
    Route::post('/login','UserController@postLogin');

    Route::group(['middleware' => 'auth'], function (){

        Route::get("/logout",'UserController@userLogout');

        Route::prefix('customer')->group(function () {

            Route::get("/",'CustomerController@index');
            Route::post("/add-inquiry",'CustomerController@postCreateInquiry');

        });

        Route::prefix('agent')->group(function () {

            Route::get("/",'AgentController@index');
            Route::get("/update/{id}",'AgentController@retriveTicket');
            Route::post("/add-feedback",'AgentController@updateInquiry');



        });
    });

});


