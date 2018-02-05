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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/add_user/{apply_id}','HomeController@add');
Route::delete('/delete_apply/{apply_id}','HomeController@delete');
Route::post('/upload', 'HomeController@upload');

Route::get('/post_admin', 'PostController@index');
Route::get('/post/{post}', 'PostController@index_certain');
Route::post('/post_up/{post_id}', 'PostController@up');
Route::post('/post_down/{post_id}', 'PostController@down');
Route::post('/search_post', 'PostController@search');
Route::post('/article_create', 'PostController@article');
Route::delete('/delete_post/{post}', 'PostController@delete');
Route::delete('/delete_reply/{post}/{reply}', 'PostController@delete_reply');

Route::delete('/delete_usr/{user}', 'UserController@delete');

