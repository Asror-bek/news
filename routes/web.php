<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

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

// Route::get('/admin', function () {
//     return view('layouts.admin');
// });

Route::get('/', function () {
    return view('layouts.frontend');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
    'namespace' => 'Admin'
], function () {
    Route::get('', function () {
        return view('layouts.admin');
    });

    Route::group([
        'prefix' => 'category',
        'as' => 'category.',
    ], function () {
//        Route::get('', ['as' => "index", "uses" => 'CategoryController@index']);
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('create', ['as' => "create", "uses" => 'CategoryController@create']);
        Route::post('store', ['as' => "store", "uses" => 'CategoryController@store']);
        Route::get('{category}/edit', ['as' => "edit", "uses" => 'CategoryController@edit']);
        Route::post('{category}', ['as' => "update", "uses" => 'CategoryController@update']);
        Route::get('{category}', ['as' => "destroy", "uses" => 'CategoryController@destroy']);
    });

    Route::group(['prefix' => 'news', 'as' => 'news.'], function () {
        Route::get('', ['as' => 'index', "uses" => 'NewsController@index']);
        Route::get('create', ['as' => "create", "uses" => 'NewsController@create']);
        Route::post('store', ['as' => "store", "uses" => 'NewsController@store']);
        Route::get('{news}/edit', ['as' => "edit", "uses" => 'NewsController@edit']);
        Route::get('{news}/show', ['as' => "show", "uses" => 'NewsController@show']);
        Route::post('{news}', ['as' => "update", "uses" => 'NewsController@update']);
        Route::get('{news}', ['as' => "destroy", "uses" => 'NewsController@destroy']);
    });

    Route::group(['prefix' => 'comment', 'as' => 'comment.'], function () {
//        Route::get('{id}', ['as' => 'index', "uses" => 'CommentController@index']);
        Route::post("store/{newsId}", ['as' => "store", "uses" => 'CommentController@store']);
    });

    Route::group(['prefix' => 'feedback', 'as' => 'feedback.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'FeedBackController@index']);
    });
});

Route::group([
    'as' => 'frontend.',
    'namespace' => 'Frontend'
], function () {
    Route::group(['prefix' => '/user/feedback', 'as' => 'user.feedback.'], function () {
        Route::get('', ['as' => 'getFeedBack', "uses" => 'FeedBackController@getFeedBack']);
        Route::post('saveFeedBack', ['as' => 'saveFeedBack', 'uses' => 'FeedBackController@saveFeedBack']);
    });

    Route::group([
        'prefix' => 'news',
        'as' => 'news.',
    ], function () {
        Route::get('', ['as' => 'index', 'uses' => 'NewsController@index']);
        Route::get('show/{news}', ['as' => 'show', 'uses' => 'NewsController@show']);
    });

    Route::group([
        'prefix' => 'contact',
        'as' => 'contact.',
    ], function () {
        Route::get('', ['as' => 'index', 'uses' => 'ContactController@index']);
    });
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

