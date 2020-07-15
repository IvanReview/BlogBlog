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


Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/article/{slug?}', 'BlogController@article')->name('article');
Route::get('/', function () {
    return view('blog.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/blog/article/{slug?}', 'CommentController@add')->name('comments.add');


Route::group([
    'prefix'=>'admin',
    'namespace'=>'Admin',
    'middleware'=>['auth']],
    function(){
        Route::get('/', 'StatisticController@statisticBlog')->name('admin.index');
        Route::resource('/category', 'CategoryController', ['as'=>'admin']);
        Route::resource('/article', 'ArticleController', ['as'=>'admin']);
        Route::resource('/user', 'UserController', ['as'=>'admin']);

});
