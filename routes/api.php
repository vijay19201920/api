<?php

use App\User;
use App\Follower;
use Illuminate\Http\Request;
use App\Notifications\UserFollowed;


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


// Registration Routes.
Route::post('register','AuthController@register');

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// Route::get('/password/token/{token}','Auth\ForgotPasswordController@findToken');

// Route::post('/password/reset','Auth\ForgotPasswordController@reset');
Route::post('/login','AuthController@login');
// Route logout and post
Route::middleware('auth:api')->group(function () {

    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::get('/post', 'PostController@getAllPost');
    Route::post('/create-post', 'PostController@createPost');
    Route::get('/get-my-post', 'PostController@getMyPost');
    Route::get('/single-post/{post_id}', 'PostController@show');
    Route::post('/post-update/{post_id}', 'PostController@updatePost');
    Route::delete('/post-delete/{post_id}', 'PostController@destroy');

    Route::post('/create-comment/{post_id}','CommentController@createComment');
    Route::get('/post-comment-count/{post_id}/{user_id?}','CommentController@getTotalComment');
    Route::delete('/post-comment-delete/{comment_id}','CommentController@destroyComment');
    Route::post('/update-comment','CommentController@updateComment');
    Route::get('/post-comments/{post_id}','CommentController@comments');

    Route::post('/post-like/{post_id}/','LikeController@likedPost');
    Route::get('/post-like-count/{post_id}/','LikeController@likedPostCount');

    Route::get('/followerCount','FollowerController@followersCount');
    Route::get('/followingCount','FollowerController@followingCount');
    // Route::post('/follow/{user}','FollowerController@follow');
    // Route::delete('/unfollow/{user}', 'FollowerController@unfollow');

    Route::post('/search','SearchController@filter');

    Route::get('/my-favorite', 'FavoriteController@myfavoritePost');
    Route::post('/favorite/{post_id}', 'FavoriteController@favoritePost');
    Route::post('/unfavorite/{post}', 'FavoriteController@unFavoritePost');
    
    // Route::get('my_favorites', 'FavoriteController@myFavorites');

    Route::get('/profile', 'ProfileController@profile');
    Route::get('/privateProfile', 'ProfileController@privateProfile');
    Route::post('/show-me', 'ProfileController@showMe');
    Route::get('listPostUserLikes','ProfileController@listPostUserLikes');
    Route::get('listPostUserComment','ProfileController@listPostUserComment');
    Route::get('savedPostByUser','ProfileController@savedPostByUser');
    
    Route::post('city','CityController@cityName');
    Route::get('city-list','CityController@citesName');
    Route::post('/notification-get', 'UsersController@get');
    Route::post('/notification/read', 'UsersController@read');
    Route::get('/notifications', 'UsersController@notifications');
    
	Route::get('users', 'UsersController@index')->name('users');
    Route::post('follow/{user}', 'UsersController@follow')->name('follow');
    Route::delete('unfollow/{user}', 'UsersController@unfollow')->name('unfollow');
    
    Route::post('get-post-by-city/{city_id}','CityController@getPostByCity');
    Route::post('get-near-by-city-name','CityController@nearByCityName');
    Route::get('get-followers-posts','PostController@getFollowPost');
    

});
