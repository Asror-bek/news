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

Route::get('/frontend', function () {
    return view('layouts.frontend');
});

// Route::get('/index', function () {
//     return view('user.index');
// });

Route::group([
    'namespace' => 'App\Http\\Controllers'
], function(){
    Route::group([
        'prefix' => '/admin/category',
        'as' => 'admin.category.',
        'namespace' => 'Admin'
    ], function() {
        Route::get('', ['as' => "index", "uses" => 'CategoryController@index']);
        Route::get('create', ['as' => "create", "uses" => 'CategoryController@create']);
        Route::post('store', ['as' => "store", "uses" => 'CategoryController@store']);
        Route::get('{category}/edit', ['as' => "edit", "uses" => 'CategoryController@edit']);
        Route::post('{category}', ['as' => "update", "uses" => 'CategoryController@update']);
        Route::get('{category}', ['as' => "destroy", "uses" => 'CategoryController@destroy']);
    });

    Route::group(['prefix' => '/admin/contact', 'as' => 'admin.contact.', 'namespace' => 'Admin'], function() {
        Route::get('', ['as' => "index", "uses" => 'ContactController@index']);
        Route::get('create', ['as' => "create", "uses" => 'ContactController@create']);
        Route::post('store', ['as' => "store", "uses" => 'ContactController@store']);
        Route::get('{contact}/edit', ['as' => "edit", "uses" => 'ContactController@edit']);
        Route::post('{contact}', ['as' => "update", "uses" => 'ContactController@update']);
        Route::get('{contact}', ['as' => "destroy", "uses" => 'ContactController@destroy']);
    });

    Route::group(['prefix' => '/admin/aboutUs', 'as' => 'admin.aboutUs.', 'namespace' => 'Admin'], function() {
        Route::get('', ['as' => 'index', "uses" => 'AboutUsController@index']);
        Route::get('create', ['as' => "create", "uses" => 'AboutUsController@create']);
        Route::post('store', ['as' => "store", "uses" => 'AboutUsController@store']);
        Route::get('{aboutUs}/edit', ['as' => "edit", "uses" => 'AboutUsController@edit']);
        Route::post('{aboutUs}', ['as' => "update", "uses" => 'AboutUsController@update']);
        Route::get('{aboutUs}', ['as' => "destroy", "uses" => 'AboutUsController@destroy']);
    });

    Route::group(['prefix' => '/admin/news', 'as' => 'admin.news.', 'namespace' => 'Admin'], function() {
        Route::get('', ['as' => 'index', "uses" => 'NewsController@index']);
        Route::get('create', ['as' => "create", "uses" => 'NewsController@create']);
        Route::post('store', ['as' => "store", "uses" => 'NewsController@store']);
        Route::get('{news}/edit', ['as' => "edit", "uses" => 'NewsController@edit']);
        Route::post('{news}', ['as' => "update", "uses" => 'NewsController@update']);
        Route::get('{news}', ['as' => "destroy", "uses" => 'NewsController@destroy']);
    });

    Route::group(['prefix' => '/admin/tags', 'as' => 'admin.tags.', 'namespace' => 'Admin'], function() {
        Route::get('', ['as' => 'index', "uses" => 'TagController@index']);
        Route::get('create', ['as' => "create", "uses" => 'TagController@create']);
        Route::post('store', ['as' => "store", "uses" => 'TagController@store']);
        Route::get('{tags}/edit', ['as' => "edit", "uses" => 'TagController@edit']);
        Route::post('{tags}', ['as' => "update", "uses" => 'TagController@update']);
        Route::get('{tags}', ['as' => "destroy", "uses" => 'TagController@destroy']);
    });

    Route::group(['prefix' => '/admin/comment', 'as' => 'admin.comment.', 'namespace' => 'Admin'], function() {
        Route::get('', ['as' => 'index', "uses" => 'CommentController@index']);
        Route::get('create', ['as' => "create", "uses" => 'CommentController@create']);
        Route::post('store', ['as' => "store", "uses" => 'CommentController@store']);
        Route::get('{comment}/edit', ['as' => "edit", "uses" => 'CommentController@edit']);
        Route::post('{comment}', ['as' => "update", "uses" => 'CommentController@update']);
        Route::get('{comment}', ['as' => "destroy", "uses" => 'CommentController@destroy']);
    });

    Route::group(['prefix' => '/user/feedback', 'as' => 'user.feedback.', 'namespace' => 'Frontend'], function() {
        Route::get('',['as' => 'getFeedBack', "uses" => 'FeedBackController@getFeedBack'] );
        Route::post('saveFeedBack', ['as' => 'saveFeedBack', 'uses' => 'FeedBackController@saveFeedBack']);
    });

    Route::group([
        'prefix' => '/frontend/index',
        'as' => 'frontend.index.',
        'namespace' => 'Frontend'
    ], function(){
        Route::get('', ['as' => 'index', 'uses' => 'NewsController@index']);
    });

    Route::group([
        'prefix' => '/frontend/contact',
        'as' => 'frontend.contact.',
        'namespace' => 'Frontend'
    ], function(){
        Route::get('', ['as' => 'index', 'uses' => 'ContactController@index']);
    });

    Route::group([
        'prefix' => '/frontend/aboutUs',
        'as' => 'frontend.aboutUs.',
        'namespace' => 'Frontend'
    ], function(){
        Route::get('', ['as' => 'index', 'uses' => 'AboutUsController@index']);
    });





});


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => ['role:admin']], function(){
//     Route::get('/', function () {
//         return view('layouts.admin');
//     });
// });
