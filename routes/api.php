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
    'middleware' => 'api',
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
    'middleware' => 'jwt.verify',
    'prefix' => 'user'

], function ($router) {
    Route::post('/list-user-block', 'User\UserController@getListUsersBlock');
    Route::post('/add-user-block', 'User\UserController@addUserBlock');
    Route::post('/remove-user-block', 'User\UserController@removeUserBlock');
    Route::post('/change-information', 'User\UserController@changeInfo');
    Route::get('/search-user', 'User\UserController@searchUser');
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'post'

], function ($router) {
    Route::post('/list-post', 'Post\PostController@getListPosts');
    Route::post('/add-post', 'Post\PostController@addPost');
    Route::get('/detail-post/{id}', 'Post\PostController@detailPost');
    Route::post('/update-post/{id}', 'Post\PostController@updatePost');
    Route::post('/remove-post/{id}', 'Post\PostController@removePost');
    Route::post('/user-like/{id}', 'Post\PostController@getUsersLike');
    Route::post('/user-share/{id}', 'Post\PostController@getUsersShare');
});

Route::group([
    'middleware' => 'jwt.verify',
    'prefix' => 'friend'

], function ($router) {
    Route::post('/list-friend', 'Friend\FriendController@getListFriends');
    Route::post('/request-friend', 'Friend\FriendController@requestFriend');
    Route::post('/send-request-friend/{id}', 'Friend\FriendController@sendRequestFriend');
    Route::post('/remove-friend/{id}', 'Friend\FriendController@removeFriend');
    Route::post('/accept-friend/{id}', 'Friend\FriendController@acceptFriend');
    Route::post('/remove-request-friend/{id}', 'Friend\FriendController@removeRequestFriend');
});
Route::get("/docs", function () {
    return view("Api.api");
});
