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
    return view('auth.login');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resource('/home', Person::class);




Route::resource('personContacts', App\Http\Controllers\PersonContactsController::class);

Route::resource('students', App\Http\Controllers\StudentsController::class);
Route::get('enroll/{id}', 'App\Http\Controllers\StudentsController@enrollID')->name('students.enrollID');

Route::resource('classes', App\Http\Controllers\ClassesController::class);

Route::resource('roles', App\Http\Controllers\RolesController::class);

Route::resource('classrooms', App\Http\Controllers\ClassroomsController::class);

Route::resource('courses', App\Http\Controllers\CoursesController::class);
Route::get('courses/list','App\Http\Controllers\CoursesController@list')->name('courses.list');




Route::resource('admission', App\Http\Controllers\AdmissionController::class);
Route::get('/acceptedList', 'App\Http\Controllers\AdmissionController@acceptedList')->name('admission.acceptedList'); //custom function
Route::get('create/{id}', 'App\Http\Controllers\AdmissionController@createStudent')->name('admission.createStudent');
//Route::get('admission', 'App\Http\Controllers\AdmissionController@getNextID')->name('admission.getNextID'); //custom function



Route::resource('register', App\Http\Controllers\RegisterAdmissionController::class);





Route::resource('studentCourses', App\Http\Controllers\StudentCoursesController::class);






Route::resource('personDetails', App\Http\Controllers\PersonDetailsController::class);