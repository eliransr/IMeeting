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
Route::get('/neworg', function () {return view('auth.registeror');})->name('neworg');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/meeting', 'MeetingController@index')->name('meetings');
Route::get('/users', 'UserController@index')->name('users');
Route::get('/users', 'UserController@index')->name('userPage');

// routh for task
Route::resource('/task', 'TaskController')->middleware('auth');;
Route::get('task', 'TaskController@index')->name('task');
Route::get('task/delete/{id}', 'TaskController@destroy')->name('delete');
Route::get('task/doneTask/{id}', 'TaskController@doneTask')->name('doneTask');
// end routh for task

// routh for topic
Route::resource('/topic', 'TopicController')->middleware('auth');;
Route::get('topic/delete/{id}', 'TopicController@destroy')->name('delete');
Route::get('topic/done/{id}', 'TopicController@done')->name('done');
// end routh for topic

Route::resource('meetings', 'MeetingController')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);



	Route::resource('mail', 'MailController')->middleware('auth');
	Route::post('send/email', 'MailController@sendemail');



});

