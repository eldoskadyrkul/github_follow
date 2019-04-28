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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user/{user}', 'UserProfileController@profile')->name('profile');

Route::post('/search', 'SearchController@search')->name('search');

Route::get('/users', 'FollowingController@allUsers')->name('allUsers');

Route::get('/following/{id}', 'FollowingController@following')->name('following');

Route::get('/notification', 'FollowingController@notification')->name('notification');

Route::get('/accept/{id}', 'FollowingController@accept')->name('accept');

Route::get('/reject/{id}', 'FollowingController@accept')->name('reject');

Route::get('/followingUser', 'FollowingController@followingUser')->name('followingUser');

Route::get('/followersUser', 'FollowingController@followersUser')->name('followersUser');

Route::get('/unfollow/{id}', 'FollowingController@unfollowUser')->name('unfollow');

Route::get('/delete/{id}', 'FollowingController@deleteFollower')->name('delete');

Route::post('/insert', 'AboutController@insertInformation')->name('insert');

Route::post('/update_form/{id}', 'AboutController@updateInfo')->name('update_form');

Route::get('/user/{allInfo}', 'AboutController@allInfo')->name('allInfo');

Route::post('/groupRepo', 'AboutController@groupBy')->name('repository');

Route::post('/groupRepo/{repo}', 'AboutController@groupbyRepo')->name('repo');

Route::get('/otherUser/{user}', 'AboutController@showOtherPage')->name('showOtherPage');