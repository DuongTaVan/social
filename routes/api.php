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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => ['api', 'cors'],
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    Route::get('/user-profile', 'AuthController@userProfile');
    Route::post('/reset-password-request', 'PasswordResetRequestController@sendPasswordResetEmail');
    Route::get('/check-token-reset-password-at/{token}', 'PasswordResetRequestController@checkTokenResetPasswordAt');
    Route::post('/change-password', 'PasswordResetRequestController@changePassword');
});

Route::group([
    'middleware' => ['jwt.verify', 'cors'],
    'prefix' => 'user'

], function ($router) {
    Route::get('/list-user-block', 'User\UserController@getUsersBlock');
    Route::post('/add-user-block', 'User\UserController@addUserBlock');
    Route::post('/remove-user-block', 'User\UserController@removeUserBlock');
    Route::post('/change-information', 'User\UserController@changeInfo');
    Route::get('/search-user', 'User\UserController@search');
    Route::get('/profile-friend/{id}', 'User\UserController@profileFriend');
    Route::get('/follower', 'User\UserController@getFollowers');
    Route::get('/following', 'User\UserController@getListFollowing');
});

Route::group([
    'middleware' => ['jwt.verify', 'cors'],
    'prefix' => 'post'

], function ($router) {
    Route::get('/list-post', 'Post\PostController@getPosts');
    Route::get('/list-post/{friendId}', 'Post\PostController@getFriendPosts');
    Route::post('/add-post', 'Post\PostController@add');
    Route::get('/detail-post/{id}', 'Post\PostController@detail');
    Route::post('/share-post/{id}', 'Post\PostController@share');
    Route::post('/update-post/{id}', 'Post\PostController@update');
    Route::post('/remove-post/{id}', 'Post\PostController@remove');
    Route::post('/user-like/{id}', 'Post\PostController@getUsersLike');
    Route::post('/user-share/{id}', 'Post\PostController@getUsersShare');
    Route::get('/home', 'Post\PostController@getPostsHome');
});

Route::group([
    'middleware' => ['jwt.verify', 'cors'],
    'prefix' => 'friend'

], function ($router) {
    Route::get('/list-friend', 'Friend\FriendController@getFriends');
    Route::post('/request-friend', 'Friend\FriendController@request');
    Route::post('/send-request-friend/{id}', 'Friend\FriendController@sendRequest');
    Route::post('/remove-friend/{id}', 'Friend\FriendController@remove');
    Route::post('/accept-friend/{id}', 'Friend\FriendController@accept');
    Route::post('/remove-request-friend/{id}', 'Friend\FriendController@removeRequest');
});

Route::group([
    'middleware' => ['jwt.verify', 'cors'],
    'prefix' => 'comment'
], function ($router) {
    Route::get('/list-comment/{id}', 'Comment\CommentController@getComments');
    Route::post('/add-comment/{id}', 'Comment\CommentController@add');
    Route::get('/detail-comment/{id}', 'Comment\CommentController@detail');
    Route::post('/update-comment/{id}', 'Comment\CommentController@update');
    Route::post('/remove-comment/{id}', 'Comment\CommentController@remove');
});

Route::group([
    'middleware' => ['jwt.verify', 'cors'],
    'prefix' => 'like'
], function ($router) {
    Route::get('/get-like', 'Like\LikeController@getLikes');
    Route::post('/add-like/{id}', 'Like\LikeController@add');
    Route::post('/remove-like/{id}', 'Like\LikeController@remove');
    Route::post('/add-like-comment/{id}', 'Like\LikeController@addLikeComment');
    Route::get('/get-like-comment', 'Like\LikeController@getLikesComment');
    Route::post('/remove-like-comment/{id}', 'Like\LikeController@removeLikeComment');
});
Route::get("/docs", function () {
    return view("Api.api");
});
