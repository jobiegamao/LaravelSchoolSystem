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

Route::get('profile', 'App\Http\Controllers\UserController@profile');
Route::post('profile', 'App\Http\Controllers\UserController@update_dp');

Route::get('students/enrolling-list', 'App\Http\Controllers\AdminController@goTo_enrollmentList')->name('goTo_enrollment.index');
Route::delete('student/delete/{id}', 'App\Http\Controllers\AdminController@studentDelete')->name('student.delete');
Route::patch('student/enroll/{id}', 'App\Http\Controllers\AdminController@studentEnroll')->name('student.enroll');
Route::get('student/enrolling-list', 'App\Http\Controllers\AdminController@studentUnenrollAll')->name('student.unenroll');
Route::patch('student/update/{id}', 'App\Http\Controllers\AdminController@studentUpdate')->name('student.update');
Route::get('student/update/units', 'App\Http\Controllers\AdminController@studentUpdateUnits')->name('student.updateUnits');

Route::get('students/promotion-list', 'App\Http\Controllers\AdminController@goTo_promotionList')->name('goTo_promotionList.index');
Route::get('student/promotion-list', 'App\Http\Controllers\AdminController@studentUnpromoteAll')->name('student.unpromote');


Route::get('enrollProgramme/{id}', 'App\Http\Controllers\AdminController@goTo_enrollProgramme')->name('goTo_enrollProgramme');
Route::get('enrollProgramme/edit/{id}', 'App\Http\Controllers\AdminController@enrollProgrammeEdit')->name('enrollProgramme.edit');
Route::post('enrollProgramme/store', 'App\Http\Controllers\AdminController@enrollProgrammeStore')->name('enrollProgramme.store');
Route::patch('enrollProgramme/update-status', 'App\Http\Controllers\AdminController@enrollProgrammeUpdate')->name('enrollProgramme.update');
Route::delete('enrollProgramme/delete/{id}', 'App\Http\Controllers\AdminController@enrollProgrammeDelete')->name('enrollProgramme.delete');

Route::get('student/courses', 'App\Http\Controllers\AdminController@goTo_courseProgramme')->name('goTo_courseProgramme');
Route::post('student/courses/curriculum', 'App\Http\Controllers\AdminController@courseProgrammeShow')->name('courseProgramme.show');

Route::any('classOffering', 'App\Http\Controllers\AdminController@goTo_classOfferings')->name('goTo_classOfferings');




Route::any('student/prereg', 'App\Http\Controllers\AdminController@goTo_prereg')->name('goTo_prereg');
Route::get('studentClass/add', 'App\Http\Controllers\AdminController@studentClassStore')->name('studentClass.store');
Route::delete('studentClass/drop', 'App\Http\Controllers\AdminController@studentClassDelete')->name('studentClass.delete');


Route::resource('acadPeriods', App\Http\Controllers\AcadPeriodController::class);

Route::get('teacher', 'App\Http\Controllers\TeacherController@index');
Route::post('teacher/{id}/classes', 'App\Http\Controllers\TeacherController@classes')->name('teacher.classes');
Route::get('class/{id}/students', 'App\Http\Controllers\TeacherController@classStudents')->name('teacher.students');
Route::patch('class/grade/{id}', 'App\Http\Controllers\TeacherController@classGradeUpdate')->name('classGrade.update');

Route::any('classes', 'App\Http\Controllers\AdminController@classOfferingsShow')->name('classOfferings.show');


Route::post('student/{id}/grades', 'App\Http\Controllers\StudentController@grades')->name('grades.show');;
