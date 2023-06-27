<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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

Route::get('login', 'App\Http\Controllers\Auth\AuthController@index')->name('login');
Route::post('post-login', 'App\Http\Controllers\Auth\AuthController@login')->name('login.post'); 
Route::get('registration', 'App\Http\Controllers\Auth\AuthController@registration')->name('register');
Route::post('post-registration', 'App\Http\Controllers\Auth\AuthController@postRegistration')->name('register.post'); 
Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', 'App\Http\Controllers\Auth\AuthController@dashboard'); 
    Route::get('logout', 'App\Http\Controllers\Auth\AuthController@logout')->name('logout');

    Route::get('educators', 'App\Http\Controllers\EducatorController@index')->name('educators.index');
    Route::get('educators/create', 'App\Http\Controllers\EducatorController@create')->name('educators.create');
    Route::get('educators/{educatorId}', 'App\Http\Controllers\EducatorController@view')->name('educators.view');
    Route::post('educator/postcreate', 'App\Http\Controllers\EducatorController@postCreate')->name('educators.postCreate');
    Route::post('educator/{educatorId}/update', 'App\Http\Controllers\EducatorController@update')->name('educators.update');

    Route::get('student', 'App\Http\Controllers\StudentController@index')->name('students.index');
    Route::get('student/create', 'App\Http\Controllers\StudentController@create')->name('students.create');
    Route::get('student/search', 'App\Http\Controllers\StudentController@search')->name('students.search');
    Route::post('student/searchPost', 'App\Http\Controllers\StudentController@searchPost')->name('students.searchPost');
    Route::get('student/searchResult', 'App\Http\Controllers\StudentController@searchResult')->name('students.searchResult');
    Route::get('students/{studentId}', 'App\Http\Controllers\StudentController@view')->name('students.view');
    Route::post('student/postcreate', 'App\Http\Controllers\StudentController@postCreate')->name('students.postCreate');
    Route::post('student/{studentId}/update', 'App\Http\Controllers\StudentController@update')->name('students.update');

    Route::get('subjects', 'App\Http\Controllers\SubjectController@index')->name('subjects.index');
    Route::get('subjects/create', 'App\Http\Controllers\SubjectController@create')->name('subjects.create');
    Route::get('subjects/{subjectId}/edit', 'App\Http\Controllers\SubjectController@edit')->name('subjects.edit');
    Route::get('subjects/{subjectId}', 'App\Http\Controllers\SubjectController@view')->name('subjects.view');
    Route::get('subjects/{subjectId}/teach', 'App\Http\Controllers\SubjectController@teach')->name('subjects.teach');
    Route::get('subjects/{subjectId}/unteach', 'App\Http\Controllers\SubjectController@unteach')->name('subjects.unteach');
    Route::get('subjects/{subjectId}/enroll', 'App\Http\Controllers\SubjectController@enroll')->name('subjects.enroll');
    Route::get('subjects/{subjectId}/unenroll', 'App\Http\Controllers\SubjectController@unenroll')->name('subjects.unenroll');
    Route::get('subjects/{subjectId}/kick/{studentId}', 'App\Http\Controllers\SubjectController@kick')->name('subjects.kick');
    Route::get('subjects/{subjectId}/enrollstudent/{studentId}', 'App\Http\Controllers\SubjectController@enrollStudent')->name('subjects.enrollStudent');
    Route::post('subject/postcreate', 'App\Http\Controllers\SubjectController@postCreate')->name('subjects.postCreate');
    Route::post('subject/{subjectId}/update', 'App\Http\Controllers\SubjectController@update')->name('subjects.update');
    Route::get('subject/search', 'App\Http\Controllers\SubjectController@search')->name('subjects.search');
    Route::post('subject/searchPost', 'App\Http\Controllers\SubjectController@searchPost')->name('subjects.searchPost');
    Route::get('subject/searchResult', 'App\Http\Controllers\SubjectController@searchResult')->name('subjects.searchResult');
});