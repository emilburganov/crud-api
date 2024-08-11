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
    Route::get('/users/{user}/posts', 'GetPostsController');
    Route::get('/users/{user}/comments', 'GetCommentsController');
    Route::post('/users', 'StoreController');
    Route::put('/users/{user}', 'UpdateController');
    Route::delete('/users/{user}', 'DestroyController');
});

Route::group(['namespace' => '\App\Http\Controllers\Comment'], function () {
    Route::get('/comments', 'IndexController');
    Route::post('/comments', 'StoreController');
    Route::put('/comments/{id}', 'UpdateController');
    Route::delete('/comments/{id}', 'DestroyController');
});


