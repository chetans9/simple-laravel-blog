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

Route::get('/', 'Home\HomeController@index');


//-------------------------------Admin-------------------------------------------//

//Auth::routes();
Route::get("/admin","Auth\LoginController@showLoginForm")->name('login');
Route::post("/login","Auth\LoginController@login");

Route::get("/blog/post/{id}","Blog\PostsController@show")->name('post');
Route::get("/blog/category/{id}","Blog\PostCategoriesController@show")->name('post_category');


//------------------------------About Us---------------------------------------//
Route::get("about","About\AboutUsController@index");

Route::get("gallery","Gallery\GalleryController@index");


Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'Admin\Dashboard\AdminDashboardController@index');
    Route::resource('posts', 'Admin\Posts\AdminPostsController');
    Route::resource('posts-categories','Admin\Posts\AdminPostsCategoriesController');

});




