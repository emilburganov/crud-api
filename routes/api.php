<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController');
    Route::post('/posts', 'StoreController');
    Route::put('/posts/{post}', 'UpdateController');
    Route::delete('/posts/{post}', 'DestroyController');
});

Route::group(['namespace' => '\App\Http\Controllers\User'], function () {
    Route::get('/users', 'IndexController');
    Route::post('/users', 'StoreController');
    Route::put('/users/{user}', 'UpdateController');
    Route::delete('/users/{user}', 'DestroyController');
});

Route::group(['namespace' => '\App\Http\Controllers\Comment'], function () {
    Route::get('/comments', 'IndexController');
    Route::post('/comments', 'StoreController');
    Route::put('/comments/{comment}', 'UpdateController');
    Route::delete('/comments/{comment}', 'DestroyController');
});


