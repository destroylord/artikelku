<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', function () {
    return view ('panel.index');
});

// Artikel
Route::group(['prefix' => 'artikel'], function () {
    Route::get('/my-artikel','ArticleController@index')->name('my.artikel');
    Route::get('/create','ArticleController@create')->name('article.create');    
});

//Category
Route::group(['prefix' => 'category','middleware' => 'admin'], function () {
    
});


// 
Route::get('/menu','MenuController@index');
