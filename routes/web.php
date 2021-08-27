<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.admin');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'namespace' => 'App\Http\\Controllers'
], function(){
    Route::group([
        'prefix' => '/category',
        'as' => 'category.'
    ], function() {
        Route::get('', ['as' => "index", "uses" => 'CategoryController@index']);
        Route::get('create', ['as' => "create", "uses" => 'CategoryController@create']);
        Route::post('store', ['as' => "store", "uses" => 'CategoryController@store']);
        Route::get('{category}/edit', ['as' => "edit", "uses" => 'CategoryController@edit']);
        Route::post('{category}', ['as' => "update", "uses" => 'CategoryController@update']);
        Route::get('{category}', ['as' => "destroy", "uses" => 'CategoryController@destroy']);
    });

    Route::group(['prefix' => '/contact', 'as' => 'contact.'], function() {
        Route::get('', ['as' => "index", "uses" => 'ContactController@index']);
        Route::get('create', ['as' => "create", "uses" => 'ContactController@create']);
        Route::post('store', ['as' => "store", "uses" => 'ContactController@store']);
        Route::get('{contact}/edit', ['as' => "edit", "uses" => 'ContactController@edit']);
        Route::post('{contact}', ['as' => "update", "uses" => 'ContactController@update']);
        Route::get('{contact}', ['as' => "destroy", "uses" => 'ContactController@destroy']);
    });

    Route::group(['prefix' => '/aboutUs', 'as' => 'aboutUs.'], function() {
        Route::get('', ['as' => 'index', "uses" => 'AboutUsController@index']);
        Route::get('create', ['as' => "create", "uses" => 'AboutUsController@create']);
        Route::post('store', ['as' => "store", "uses" => 'AboutUsController@store']);
        Route::get('{aboutUs}/edit', ['as' => "edit", "uses" => 'AboutUsController@edit']);
        Route::post('{aboutUs}', ['as' => "update", "uses" => 'AboutUsController@update']);
        Route::get('{aboutUs}', ['as' => "destroy", "uses" => 'AboutUsController@destroy']);
    });

    Route::group(['prefix' => '/news', 'as' => 'news.'], function() {
        Route::get('', ['as' => 'index', "uses" => 'NewsController@index']);
        Route::get('create', ['as' => "create", "uses" => 'NewsController@create']);
        Route::post('store', ['as' => "store", "uses" => 'NewsController@store']);
        Route::get('{news}/edit', ['as' => "edit", "uses" => 'NewsController@edit']);
        Route::post('{news}', ['as' => "update", "uses" => 'NewsController@update']);
        Route::get('{news}', ['as' => "destroy", "uses" => 'NewsController@destroy']);
    });

    Route::group(['prefix' => '/tags', 'as' => 'tags.'], function() {
        Route::get('', ['as' => 'index', "uses" => 'TagController@index']);
        Route::get('create', ['as' => "create", "uses" => 'TagController@create']);
        Route::post('store', ['as' => "store", "uses" => 'TagController@store']);
        Route::get('{tags}/edit', ['as' => "edit", "uses" => 'TagController@edit']);
        Route::post('{tags}', ['as' => "update", "uses" => 'TagController@update']);
        Route::get('{tags}', ['as' => "destroy", "uses" => 'TagController@destroy']);
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['role:admin']], function(){
//     Route::get('/', function () {
//         return view('layouts.admin');
//     });
// });
