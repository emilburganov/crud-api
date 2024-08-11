<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController');
    Route::get('/posts/{id}/comments', 'GetCommentsController');
    Route::post('/posts', 'StoreController');
    Route::put('/posts/{id}', 'UpdateController');
    Route::delete('/posts/{id}', 'DestroyController');
});

Route::group(['namespace' => '\App\Http\Controllers\User'], function () {
    Route::get('/users', 'IndexController');
    Route::get('/users/{id}/posts', 'GetPostsController');
    Route::get('/users/{id}/comments', 'GetCommentsController');
    Route::post('/users', 'StoreController');
    Route::put('/users/{id}', 'UpdateController');
    Route::delete('/users/{id}', 'DestroyController');
});

Route::group(['namespace' => '\App\Http\Controllers\Comment'], function () {
    Route::get('/comments', 'IndexController');
    Route::post('/comments', 'StoreController');
    Route::put('/comments/{id}', 'UpdateController');
    Route::delete('/comments/{id}', 'DestroyController');
});


