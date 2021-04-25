<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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





Route::get('/...', function () {
    return view('auth.login');
});

Route::get('/filter', function () {
    return view('listfilter');
});

// Route::get('/homepage', function () {
//     return view('HomePage');
// });


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


// =====================Routes for the posts======================
Route::get('/posts', 'PostController@index')->name('posts.index')->middleware('auth');

Route::get('/create', 'PostController@create')->name('posts.create')->middleware('auth');
Route::POST('store','PostController@store')->name('posts.store')->middleware('auth');
Route::get('/show/{id}', 'PostController@show')->name('posts.show')->middleware('auth');
Route::POST('commetsStore','CommentController@store')->name('comments.store')->middleware('auth');
Route::DELETE('/delete/{id}', 'PostController@destroy')->name('posts.delete')->middleware('auth');

Route::get('/edit/{id}2364234', 'PostController@edit')->name('posts.edit')->middleware('auth');

Route::PUT('/update/{id}2342343242', 'PostController@update')->name('posts.update')->middleware('auth');

// =====================for ajax request======================

Route::get('/postcatagory/{id}', 'Catagory@create')->name('posts.catagory')->middleware('auth');



// =====================Routes for the comments and replying system======================

Route::DELETE('/delete-comment/{id}', 'CommentController@destroy')->name('comment.delete')->middleware('auth');
Route::get('/commentedit/{id}2364434', 'CommentController@edit')->name('comment.edit')->middleware('auth');
Route::PUT('/commentupdate/{id}2332423', 'CommentController@update')->name('comment.update')->middleware('auth');


// =====================Routes for catagories ===========================================
Route::get('/post/{id}', 'Catagory@fetch_details')->name('posts.java')->middleware('auth');
Route::get('/students/guide', 'Catagory@students_guide')->name('guide.links')->middleware('auth');
