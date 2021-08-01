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

Route::get('/table', function () {
    return view('menu_Super/enrollment/index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('students/enrolling-list', 'App\Http\Controllers\AdminController@goTo_enrollmentList')->name('goTo_enrollment.index');
Route::delete('student/delete/{id}', 'App\Http\Controllers\AdminController@studentDelete')->name('student.delete');
Route::patch('student/enroll/{id}', 'App\Http\Controllers\AdminController@studentEnroll')->name('student.enroll');
Route::get('student/enrolling-list', 'App\Http\Controllers\AdminController@studentUnenrollAll')->name('student.unenroll');


Route::get('enrollProgramme/{id}', 'App\Http\Controllers\AdminController@goTo_enrollProgramme')->name('goTo_enrollProgramme');
Route::post('enrollProgramme/store', 'App\Http\Controllers\AdminController@enrollProgrammeStore')->name('enrollProgramme.store');
Route::delete('enrollProgramme/delete/{id}', 'App\Http\Controllers\AdminController@enrollProgrammeDelete')->name('enrollProgramme.delete');

Route::get('student/courses', 'App\Http\Controllers\AdminController@goTo_courseProgramme')->name('goTo_courseProgramme');
Route::post('student/courses', 'App\Http\Controllers\AdminController@courseProgrammeShow')->name('courseProgramme.show');

// Route::resource('personContacts', App\Http\Controllers\PersonContactsController::class);


// Route::get('enroll/{id}', 'App\Http\Controllers\StudentsController@enrollID')->name('students.enrollID');

// Route::resource('classes', App\Http\Controllers\ClassesController::class);

// Route::resource('roles', App\Http\Controllers\RolesController::class);

// Route::resource('classrooms', App\Http\Controllers\ClassroomsController::class);

// Route::resource('courses', App\Http\Controllers\CoursesController::class);
// Route::get('courses/list','App\Http\Controllers\CoursesController@list')->name('courses.list');

// Route::resource('studentCourses', App\Http\Controllers\StudentCoursesController::class);




// Route::resource('admission', App\Http\Controllers\AdmissionController::class);
// Route::get('/acceptedList', 'App\Http\Controllers\AdmissionController@acceptedList')->name('admission.acceptedList'); //custom function
// Route::get('create/{id}', 'App\Http\Controllers\AdmissionController@createStudent')->name('admission.createStudent');
// //Route::get('admission', 'App\Http\Controllers\AdmissionController@getNextID')->name('admission.getNextID'); //custom function



// Route::resource('register', App\Http\Controllers\RegisterAdmissionController::class);

// Route::get('finance/register-admission/list', 'App\Http\Controllers\FinanceController@registeredAdmissionList')->name('finance.admissionList');
// Route::get('finance/register-admission/pay-log/{id}', 'App\Http\Controllers\FinanceController@enrollPayLog')->name('finance.enrollPayLog');




// Route::resource('personDetails', App\Http\Controllers\PersonDetailsController::class);