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

Route::get('/', 'ArticlesController@getPosts')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/article/{id}', 'ArticlesController@getArticle')->name('article');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/create_post', 'ArticlesController@addArticle')->name('create_post');
    Route::post('/create_post', 'ArticlesController@addArticle')->name('create_post');
    Route::get('/users_articles/{user_id}', 'ArticlesController@selectUsersArticles')->name('users_articles');
    Route::get('/published_articles/{user_id}', 'ArticlesController@publishedArticles')->name('published_articles');
    Route::get('/unpublished_articles/{user_id}', 'ArticlesController@unpublishedArticles')->name('unpublished_articles');
    Route::post('/add_comment', 'CommentsController@addComment')->name('add_comment');
    Route::get('/delete_comment/{id}', 'CommentsController@deleteComment')->name('delete_comment');
});

//admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {    
    Route::get('/', 'Admin\AccountController@action')->name('admin');
    // Articles
    Route::get('/articles_edit', 'Admin\ArticlesController@getPosts')->name('articles_edit');
    Route::get('/article_del/{id}','Admin\ArticlesController@deleteArticle')->name('article_del');
    Route::get('/article_publ/{id}','Admin\ArticlesController@publArticle')->name('article_publ');

    // Users
    Route::get('/users_edit', 'Admin\UsersController@getUsers')->name('users_edit');
    Route::get('/user_del/{id}','Admin\UsersController@deleteUser')->name('user_del');
});

