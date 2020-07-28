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
Auth::routes();

Route::get('/', 'GuestController@schedule')->name('schedule');
Route::get('/home', 'GuestController@schedule')->name('schedule');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@schedule')->name('admin');
    Route::post('/', 'Admin\DashboardController@addSchedule')->name('post.schedule');
});
Route::group(['prefix' => 'teacher', 'middleware' => 'teacher'], function () {
    Route::get('/', 'TeacherController@schedule')->name('teacher');
});

