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
Route::resource('users', 'UserController');
Route::resource('photos', 'PhotoController');
Auth::routes();
Route::match(['post', 'get'], 'profile/{profileId}/follow', 'ProfileController@followUser')->name('users.follow');
Route::match(['post', 'get'], 'profile/{profileId}/unfollow', 'ProfileController@unFollowUser')->name('users.unfollow');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('image-upload', 'ImageUploadController@imageUpload')->name('image.upload');
Route::get('/like-post/{postId}', 'PhotoController@like_post')->name('like-post');
Route::get('/post-comment/{id}', 'CommentController@comment')->name('post-comment');
Route::post('image-upload', 'ImageUploadController@imageUploadPost')->name('image.upload.post');