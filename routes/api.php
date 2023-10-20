<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/posts','PostController');
Route::apiResource('/categories','CategoryController');
Route::get('/category/{slug}/posts','PostController@categoryPosts');
Route::get('/search-posts/{query}','PostController@searchPosts');
Route::post('/login' , 'UserController@login');
Route::post('/register' , 'UserController@register');
Route::middleware('auth:api')->group(function () {
    Route::get('user', 'UserController@details');
    Route::post('comment/store', 'CommentController@store');

    Route::get('getUnreadNotifications', 'UserController@getUnreadNotifications');
    Route::get('getAllNotifications', 'UserController@getAllNotifications');
    Route::put('markNotificationAsRead', 'UserController@markNotificationAsRead');
});
Route::group(['prefix'=>'/admin' , 'middleware' => ['auth:api', 'isAdmin']], function (){
    Route::get('posts' , 'Admin\AdminController@getPosts' );
    Route::get('post/{slug}' , 'Admin\AdminController@showPost' );
    Route::get('categories' , 'Admin\AdminController@getcategories' );
    Route::post('add-post' , 'Admin\AdminController@addPosts' );
    Route::post('update-post' , 'Admin\AdminController@UpdatePost' );
    Route::post('delete-post' , 'Admin\AdminController@DeletePosts' );
});


