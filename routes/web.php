<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\Blog\PostCategoriesController;
use App\Http\Controllers\Blog\SearchController;
use App\Http\Controllers\About\AboutUsController;
use App\Http\Controllers\Contact\ContactUsController;
use App\Http\Controllers\Gallery\GalleryController;


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
Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes();


Route::get("/admin",[LoginController::class, 'showLoginForm'])->name('login');
Route::post("/login",[LoginController::class,'login']);
Route::post("/logout",[LoginController::class,'logout'])->name('logout');

Route::get("/blog/post/{id}",[PostsController::class, 'show'])->name('post');
Route::post("/blog/post/{id}/save-comment",[PostsController::class, 'storeComment']);
Route::get("/blog/category/{id}",[PostCategoriesController::class,'show'])->name('post_category');
Route::get('blog/search', [SearchController::class,'index'])->name('blog.search');


//------------------------------About Us---------------------------------------//
Route::get("about",[AboutUsController::class,'index']);
Route::get("contact",[ContactUsController::class,'index']);
Route::post("contact",[ContactUsController::class,'store']);

Route::get("gallery",[GalleryController::class,'index']);


Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin'], function () {

    Route::get('/dashboard', 'Dashboard\AdminDashboardController@index')->name('admin.dashboard');
    Route::resource('posts', 'Posts\AdminPostsController');
    Route::resource('posts-categories','Posts\AdminPostsCategoriesController');
    Route::get('/comments','Comments\AdminCommentsController@index')->name('admin.comments');
    Route::get('/comments/{id}/edit','Comments\AdminCommentsController@edit')->name("admin.comments.edit");
    Route::patch('/comments/{id}','Comments\AdminCommentsController@update')->name('admin.comments.update');
    Route::delete('/comments/{id}','Comments\AdminCommentsController@destroy')->name('admin.comments.delete');

    Route::resource('gallery',"Gallery\AdminGalleryController");
    Route::get('contact',"Contact\AdminContactController@index");
    Route::get('contact/{id}',"Contact\AdminContactController@show")->name('admin.contact.show');
    Route::resource('tags',"Tags\AdminTagsController");
    Route::get('tags-suggest',"Tags\AdminTagsController@showTagsSuggestions");
    Route::resource('users','Users\AdminUsersController');

});

