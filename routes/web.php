<?php

use App\Article;
use Illuminate\Support\Facades\Route;

Route::get('/','HomepageController@index')->name('beranda');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view ('panel.index');
});

// Artikel
Route::group(['prefix' => 'artikel'], function () {
    Route::get('/my-artikel','ArticleController@index')->name('my.artikel');
    Route::get('/create','ArticleController@create')->name('article.create');
    Route::post('/store','ArticleController@store')->name('article.store');
    Route::get('/{article:slug}/edit','ArticleController@edit');
    Route::patch('/{article:slug}/edit','ArticleController@update');
    Route::delete('/delete/{id}','ArticleController@destroy')->name('article.delete');
});

//Category
Route::group(['prefix' => 'category'], function () {
    Route::get('/','CategoryController@index')->name('categori.index');
    Route::get('/getCategory','CategoryController@getCategory')->name('categori.getCategory');
    Route::get('/create','CategoryController@create')->name('category.create');
    Route::post('/store','CategoryController@store')->name('category.store');
    Route::get('/{category:slug}/edit','CategoryController@edit');
    Route::patch('/{category:slug}/edit','CategoryController@update');
    Route::delete('/delete/{id}','CategoryController@destroy')->name('category.delete');
});

// tags
Route::group(['prefix' => 'tag'], function () {
    Route::get('/','TagController@index')->name('tag.index');
    Route::get('/create','TagController@create')->name('tag.create');
    Route::post('/store','TagController@store')->name('tag.store');
    Route::get('/{tag:slug}/edit','TagController@edit');
    Route::patch('/{tag:slug}/edit','TagController@update');
    Route::delete('/delete/{id}','TagController@destroy')->name('tag.delete');
});
//Menu 
Route::get('/menu','MenuController@index');


Route::get('/categories/{article:category}','CategoryController@show');