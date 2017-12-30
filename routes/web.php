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

Route::get('/', 'Home\HomeController@index')->name('home');


//-------------------------------Admin-------------------------------------------//

//Auth::routes();
Route::get("/admin","Auth\LoginController@showLoginForm")->name('login');
Route::post("/login","Auth\LoginController@login");
Route::post("/logout","Auth\LoginController@logout")->name('logout');

Route::get("/blog/post/{id}","Blog\PostsController@show")->name('post');
Route::post("/blog/post/{id}/save-comment","Blog\PostsController@storeComment");
Route::get("/blog/category/{id}","Blog\PostCategoriesController@show")->name('post_category');
Route::get('blog/search', 'Blog\SearchController@index')->name('blog.search');


//------------------------------About Us---------------------------------------//
Route::get("about","About\AboutUsController@index");
Route::get("contact","Contact\ContactUsController@index");
Route::post("contact","Contact\ContactUsController@store");

Route::get("gallery","Gallery\GalleryController@index");


Route::group(['prefix' => 'admin'], function () {

    Route::get('/dashboard', 'Admin\Dashboard\AdminDashboardController@index')->name('admin.dashboard');
    Route::resource('posts', 'Admin\Posts\AdminPostsController');
    Route::resource('posts-categories','Admin\Posts\AdminPostsCategoriesController');
    Route::get('/comments','Admin\Comments\AdminCommentsController@index')->name('admin.comments');
    Route::get('/comments/{id}/edit','Admin\Comments\AdminCommentsController@edit')->name("admin.comments.edit");
    Route::patch('/comments/{id}','Admin\Comments\AdminCommentsController@update')->name('admin.comments.update');
    Route::delete('/comments/{id}','Admin\Comments\AdminCommentsController@destroy')->name('admin.comments.delete');

    Route::resource('gallery',"Admin\Gallery\AdminGalleryController");
    Route::get('contact',"Admin\Contact\AdminContactController@index");
    Route::get('contact/{id}',"Admin\Contact\AdminContactController@show")->name('admin.contact.show');
    Route::resource('tags',"Admin\Tags\AdminTagsController");
    Route::get('tags-suggest',"Admin\Tags\AdminTagsController@showTagsSuggestions");
    Route::resource('users','Admin\Users\AdminUsersController');

});




