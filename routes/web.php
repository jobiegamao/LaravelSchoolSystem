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
Route::post('enrollProgramme/edit/{id}', 'App\Http\Controllers\AdminController@enrollProgrammeEdit')->name('enrollProgramme.edit');
Route::post('enrollProgramme/store', 'App\Http\Controllers\AdminController@enrollProgrammeStore')->name('enrollProgramme.store');
Route::patch('enrollProgramme/update-status', 'App\Http\Controllers\AdminController@enrollProgrammeUpdate')->name('enrollProgramme.update');
Route::delete('enrollProgramme/delete/{id}', 'App\Http\Controllers\AdminController@enrollProgrammeDelete')->name('enrollProgramme.delete');

Route::post('student/courses', 'App\Http\Controllers\AdminController@goTo_courseProgramme')->name('goTo_courseProgramme');
Route::post('student/courses/curriculum', 'App\Http\Controllers\AdminController@courseProgrammeShow')->name('courseProgramme.show');


Route::resource('acadPeriods', App\Http\Controllers\AcadPeriodController::class);

Route::post('teacher', 'App\Http\Controllers\TeacherController@index')->name('teacher.list');
Route::post('teacher/{id}/classes', 'App\Http\Controllers\TeacherController@classes')->name('teacher.classes');
Route::get('class/students', 'App\Http\Controllers\TeacherController@classStudents')->name('teacher.students');
Route::patch('class/grade/{id}', 'App\Http\Controllers\TeacherController@classGradeUpdate')->name('classGrade.update');

Route::any('classes', 'App\Http\Controllers\AdminController@classOfferingsShow')->name('classOfferings.show');


Route::post('student/{id}/grades', 'App\Http\Controllers\StudentController@grades')->name('grades.show');
Route::post('student/{id}/balance', 'App\Http\Controllers\StudentController@balance')->name('balance.show');

Route::any('classOffering', 'App\Http\Controllers\AdminController@goTo_classOfferings')->name('goTo_classOfferings');
Route::any('student/prereg/{id}', 'App\Http\Controllers\AdminController@goTo_prereg')->name('goTo_prereg');
Route::any('studentClass/add', 'App\Http\Controllers\AdminController@studentClassStore')->name('studentClass.store');
Route::delete('studentClass/drop', 'App\Http\Controllers\AdminController@studentClassDelete')->name('studentClass.delete');

Route::get('registrar/index', 'App\Http\Controllers\RegistrarController@index')->name('registrar.index');
Route::get('registrar/add-payment/{id}', 'App\Http\Controllers\RegistrarController@goTo_payment')->name('goTo_payment');
Route::post('registrar/add-payment/{id}', 'App\Http\Controllers\RegistrarController@paymentStore')->name('payment.store');
Route::get('registrar/{id}/payments-history', 'App\Http\Controllers\RegistrarController@paymentShow')->name('payment.show');
// Route::post('registrar/{id}/balance', 'App\Http\Controllers\RegistrarController@balanceShow')->name('balance.show');
Route::get('registrar/{id}/balance', 'App\Http\Controllers\RegistrarController@balance')->name('balance');
Route::get('registrar/update-dues', 'App\Http\Controllers\RegistrarController@updateDues')->name('update.dues');
Route::patch('registrar/tag/{id}', 'App\Http\Controllers\RegistrarController@updateEnrollTag')->name('update.enrollTag');

