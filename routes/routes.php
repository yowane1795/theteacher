<?php

// Post

Route::get('/',  'App\Controllers\PostController@index');
Route::get('/post/{id}',  'App\Controllers\PostController@show');
Route::get('/posts',  'App\Controllers\PostController@welcome');
Route::get('/posts/cours/PHP',  'App\Controllers\PostController@php');
Route::get('/posts/cours/Base-de-données',  'App\Controllers\PostController@bdd');
Route::get('/posts/cours/HTML',  'App\Controllers\PostController@html');
Route::get('/posts/cours/JS',  'App\Controllers\PostController@js');
Route::get('/posts/exercices/PHP',  'App\Controllers\PostController@exoPhp');
Route::get('/posts/exercices/Base-de-données',  'App\Controllers\PostController@exoBdd');
Route::get('/posts/exercices/HTML',  'App\Controllers\PostController@exoHtml');
Route::get('/posts/exercices/JS',  'App\Controllers\PostController@exoJs');


// User

Route::get('/login',  'App\Controllers\UserController@login');
Route::post('/login',  'App\Controllers\UserController@loginPost');
Route::get('/login/show/{id}',  'App\Controllers\UserController@show');
Route::get('/login/destroy/{id}',  'App\Controllers\UserController@destroy');
Route::get('/login/edit/{id}',  'App\Controllers\UserController@edit');
Route::post('/login/edit',  'App\Controllers\UserController@editPost');

// Inscription

Route::get('/subscribe',  'App\Controllers\UserController@subscribe');
Route::post('/subscribe',  'App\Controllers\UserController@subscribePost');

// Déconnexion

Route::get('/logout',  'App\Controllers\UserController@logout');

// Administrateur

Route::get('/posts/store',  'App\Controllers\AdminController@index');

Route::get('/posts/create',  'App\Controllers\AdminController@create');
Route::post('/posts/create',  'App\Controllers\AdminController@createPost');

Route::post('/posts/destroy',  'App\Controllers\AdminController@destroy');

Route::get('/posts/update/{id}',  'App\Controllers\AdminController@update');
Route::post('/posts/update',  'App\Controllers\AdminController@updatePost');

// Commentaires

Route::post('/posts/comment',  'App\Controllers\CommentController@comment');
