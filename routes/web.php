<?php

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
Route::middleware(['admin'])->group(function(){  
    Route::get('posts/create','Posts\PostsController@create');
 
Route::post('posts','Posts\PostsController@store'); 
Route::get('/posts/edit/{post}','Posts\PostsController@edit');  
Route::put('/posts','Posts\PostsController@update'); 
Route::delete('/posts/{post}','Posts\PostsController@destroy');
});
Route::get('/', function () {
    return view('welcome');
});  

Route::get('posts/{post}','Posts\PostsController@show');  
Route::get('posts','Posts\PostsController@index');  
Route::post('/posts','CommentsController@store');



Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); 

