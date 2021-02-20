<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/test', function () {
//     return view('findFriends');
// });

// to display all friends that the user got
// i have to add this route to auth middleware
//Route::get('/pending', 'applicationController@findFriends');
//Route::get('/addFriend/{id}', 'HomeController@sendFriend');
//Route::get('/requests','HomeController@requests');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/accept/{id}','HomeController@accept');
Auth::routes();
// Route::get('/pending',function ()
// {
//     return view('requests');
// });
Route::group(['middleware' => 'auth'], function(){
    Route::get('/findFriend', 'applicationController@findFriends');
    Route::get('/addFriend/{id}', 'applicationController@sendRequest');
    Route::get('/requests', 'applicationController@requests');
    Route::get('/accept/{id}','applicationController@accept');
});