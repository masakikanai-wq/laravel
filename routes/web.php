<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('article', 'ArticleController');


// ArticleControlloer
// 記事一覧画面を表示
Route::get('/', 'ArticleController@index')->name('articles');

// 記事登録するメソッド
Route::post('/create', 'ArticleController@create')->name('create');

// 記事詳細画面を表示
Route::get('/article/{id}', 'ArticleController@show')->name('show');

// 記事編集
Route::get('/article/edit/{id}', 'ArticleController@edit')->name('article.edit');

// 記事更新
Route::PUT('/article/update/{id}', 'ArticleController@update')->name('article.update');

// 記事削除
Route::DELETE('/destroy/article/{id}', 'ArticleController@destroy')->name('article.destroy');


// CommentController
// コメント登録
Route::post('/comment', 'CommentController@store')->name('comment.store');

// コメント削除
Route::DELETE('/destroy/comment/{id}', 'CommentController@destroy')->name('comment.destroy');
