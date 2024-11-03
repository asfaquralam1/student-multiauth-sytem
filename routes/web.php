<?php

use Illuminate\Support\Facades\Route;

Route::post('/login-user', 'Auth\LoginController@login')->name('/');
Route::get('/login', 'Auth\LoginController@index')->name('login');
//Registration
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/register/student', 'Auth\RegisterController@registerstudent')->name('/register/student');
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
Route::get('all-courses', 'CourseController@show');
Route::get('coursesedit/{id}', 'CourseController@edit')->name('coursesedit/{id}');
Route::put('courses-update/{id}', 'CourseController@update');
Route::delete('courses/{id}', 'CourseController@destroy');


// instractors
// Route::get('instractors','InstractorController@index');
// Route::post('instractor/create', 'InstractorController@store');
// Route::get('instractors/show', 'InstractorController@show');
// Route::get('instractors/{id}/edit', 'InstractorController@edit');
// Route::put('instractors/{id}', 'InstractorController@update');
// Route::delete('instractors/{id}', 'InstractorController@destroy');

Route::resource('instractors', 'InstractorController');
Route::get('/pdf/view/{filename}', 'Auth\RegisterController@viewPDF')->name('pdf.view');

Route::get('/practice/login', 'HomeController@parctice_loginview')->name('practice-login');
Route::post('/practice/login', 'HomeController@parctice_login')->name('practice-login');
Route::middleware('auth')->group(function () {
});
Route::get('/practice', 'HomeController@parctice');
Route::post('/practice', 'HomeController@parctice_create')->name('practice-create');
