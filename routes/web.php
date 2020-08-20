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
Route::group(['prefix' => 'category'], function () {
    Route::get('/','CategoryController@index')->name('categori.index');
    Route::get('/create','CategoryController@create')->name('category.create');
    Route::post('/store','CategoryController@store')->name('category.store');
});


// 
Route::get('/menu','MenuController@index');
