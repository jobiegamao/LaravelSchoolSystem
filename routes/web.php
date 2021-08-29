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

Route::get('students/enrolling-list', 'App\Http\Controllers\RegistrarController@goTo_enrollmentList')->name('goTo_enrollment.index');
Route::delete('student/delete/{id}', 'App\Http\Controllers\RegistrarController@studentDelete')->name('student.delete');
Route::patch('student/enroll/{id}', 'App\Http\Controllers\RegistrarController@studentEnroll')->name('student.enroll');
Route::get('student/enrolling-list', 'App\Http\Controllers\RegistrarController@studentUnenrollAll')->name('student.unenroll');
Route::patch('student/update/{id}', 'App\Http\Controllers\RegistrarController@studentUpdate')->name('student.update');
Route::get('student/update/units', 'App\Http\Controllers\RegistrarController@studentUpdateUnits')->name('student.updateUnits');

Route::get('students/promotion-list', 'App\Http\Controllers\RegistrarController@goTo_promotionList')->name('goTo_promotionList.index');
Route::get('student/promotion-list', 'App\Http\Controllers\RegistrarController@studentUnpromoteAll')->name('student.unpromote');


Route::get('enrollProgramme/{id}', 'App\Http\Controllers\RegistrarController@goTo_enrollProgramme')->name('goTo_enrollProgramme');
Route::get('enrollProgramme/edit/{id}', 'App\Http\Controllers\RegistrarController@enrollProgrammeEdit')->name('enrollProgramme.edit');
Route::post('enrollProgramme/store', 'App\Http\Controllers\RegistrarController@enrollProgrammeStore')->name('enrollProgramme.store');
Route::patch('enrollProgramme/update-status', 'App\Http\Controllers\RegistrarController@enrollProgrammeUpdate')->name('enrollProgramme.update');
Route::delete('enrollProgramme/delete/{id}', 'App\Http\Controllers\RegistrarController@enrollProgrammeDelete')->name('enrollProgramme.delete');

Route::get('student/courses', 'App\Http\Controllers\RegistrarController@goTo_courseProgramme')->name('goTo_courseProgramme');
Route::get('student/courses/curriculum', 'App\Http\Controllers\RegistrarController@courseProgrammeShow')->name('courseProgramme.show');


Route::resource('acadPeriods', App\Http\Controllers\AcadPeriodController::class);

Route::get('teacher', 'App\Http\Controllers\TeacherController@index')->name('teacher.list');
Route::post('teacher', 'App\Http\Controllers\TeacherController@gradeReport')->name('teacher.report');

Route::get('teacher/{id}/current-classes', 'App\Http\Controllers\TeacherController@classes')->name('teacher.classes');
Route::get('teacher/{id}/all-classes', 'App\Http\Controllers\TeacherController@allclasses')->name('teacher.allclasses');
Route::get('class/students', 'App\Http\Controllers\TeacherController@classStudents')->name('teacher.students');
Route::patch('class/grade/{id}', 'App\Http\Controllers\TeacherController@classGradeUpdate')->name('classGrade.update');

Route::any('classes', 'App\Http\Controllers\RegistrarController@classOfferingsShow')->name('classOfferings.show');


Route::get('student/{id}/grades', 'App\Http\Controllers\StudentController@grades')->name('grades.show');
Route::post('student/{id}/balance', 'App\Http\Controllers\StudentController@balance')->name('balance.show');

Route::any('classOffering', 'App\Http\Controllers\RegistrarController@goTo_classOfferings')->name('goTo_classOfferings');
Route::any('student/prereg', 'App\Http\Controllers\RegistrarController@goTo_prereg')->name('goTo_prereg');
Route::any('studentClass/add', 'App\Http\Controllers\RegistrarController@studentClassStore')->name('studentClass.store');
Route::delete('studentClass/drop', 'App\Http\Controllers\RegistrarController@studentClassDelete')->name('studentClass.delete');

Route::get('finance/index', 'App\Http\Controllers\FinanceController@index')->name('registrar.index');
Route::get('finance/add-payment/{id}', 'App\Http\Controllers\FinanceController@goTo_payment')->name('goTo_payment');
Route::post('finance/add-payment/{id}', 'App\Http\Controllers\FinanceController@paymentStore')->name('payment.store');
Route::get('finance/{id}/payments-history', 'App\Http\Controllers\FinanceController@paymentShow')->name('payment.show');
Route::get('finance/{id}/balance', 'App\Http\Controllers\FinanceController@balance')->name('balance');
Route::get('finance/update-dues', 'App\Http\Controllers\FinanceController@updateDues')->name('update.dues');
Route::patch('finance/tag/{id}', 'App\Http\Controllers\FinanceController@updateEnrollTag')->name('update.enrollTag');

