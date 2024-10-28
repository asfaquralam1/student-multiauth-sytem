<?php

use Illuminate\Support\Facades\Route;

Route::get('/','Auth\LoginController@index')->name('/');
Route::post('/login','Auth\LoginController@login')->name('login');
//Registration
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/register/student','Auth\RegisterController@registerstudent')->name('/register/student');
Route::get('register/{id}/edit', 'Auth\RegisterController@registerstudentedit')->name('edit-profile');
Route::put('register/{id}', 'Auth\RegisterController@registerstudnetupdate');
Route::delete('register/{id}', 'Auth\RegisterController@destroy');

//verifiation
Route::get('/verify', 'Auth\RegisterController@verifyIndex');
Route::post('/verify', 'Auth\RegisterController@verifyUser')->name('verify');

//login
// Route::post('/','Auth\LoginController@index');
Route::post('/', 'Auth\LoginController@login')->name('/');
Route::get('logout', 'Auth\LogoutController@logout')->name('logout');

//User Resource Route
Route::resource('/user', 'UserController');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

//Student
Route::get('students', 'StudentfromController@index')->name('student');
Route::get('students', 'StudentfromController@show')->name('student.all');
Route::post('students', 'StudentfromController@store');
Route::put('studentupdate/{id}', 'StudentfromController@update');
Route::delete('studentdelete/{id}', 'StudentfromController@delete');

//Course
Route::get('courses', 'CourseController@index')->name('courses');
Route::post('add-courses', 'CourseController@store')->name('add-courses');
Route::get('all-courses','CourseController@show');
Route::get('coursesedit/{id}', 'CourseController@edit')->name('coursesedit/{id}');
Route::put('courses-update/{id}', 'CourseController@update');
Route::delete('courses/{id}', 'CourseController@destroy');


// instractors
Route::get('instractors','InstractorController@index')->name('instractors');
Route::post('instractor', 'InstractorController@store');
Route::get('instractorsshow', 'InstractorController@show')->name('instractors.show');
Route::get('edit-isntractor/{id}', 'InstractorController@edit');
Route::put('update-isntractor/{id}', 'InstractorController@update');
Route::delete('delete-isntractor/{id}', 'InstractorController@destroy');
