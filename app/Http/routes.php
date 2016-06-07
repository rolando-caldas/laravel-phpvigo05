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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web', 'auth']], function () {
        
    Route::get('/author', 'AuthorController@index');
    
    Route::get('/author/{id}/delete', 'AuthorController@remove')
            ->where(['id' => '^[\d]+$']);
    
    Route::get('/author/{id}/edit', 'AuthorController@edit')
            ->where(['id' => '^[\d]+$']);
    
    Route::get('/author/{slug}', 'AuthorController@view')
            ->where(['slug' => '^[\w\d_-]+$']);
    
    Route::post('/author', 'AuthorController@create');
    
    Route::post('/author/{id}/edit', 'AuthorController@update')
            ->where(['id' => '^[\d]+$']);


    Route::get('/book', 'BookController@index');
    
    Route::get('/book/{id}/delete', 'BookController@remove')
            ->where(['id' => '^[\d]+$']);
    
    Route::get('/book/{id}/edit', 'BookController@edit')
            ->where(['id' => '^[\d]+$']);
    
    Route::get('/book/{slug}', 'BookController@view')
            ->where(['slug' => '^[\w\d_-]+$']);
    
    Route::post('/book', 'BookController@create');
    
    Route::post('/book/{id}/edit', 'BookController@update')
            ->where(['id' => '^[\d]+$']);
    
    
    Route::get('/static/{image}', function ($image) {        
        return response()->make(file_get_contents(storage_path('app/public') . '/' . $image), 200);        
    })->where(['image' => '^(.*)+$']);    
});


Route::group(['middleware' => ['web', 'admin']], function () {
    
    Route::get('/hola', function () {
        echo "hi!";
    });
    
});