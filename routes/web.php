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

Route::get('students/enrolling-list', 'App\Http\Controllers\RegistrarController@goTo_enrollmentList')->name('goTo_enrollment.index')->middleware('role:Registrar');
Route::delete('student/delete/{id}', 'App\Http\Controllers\RegistrarController@studentDelete')->name('student.delete')->middleware('role:Registrar');
Route::patch('student/enroll/{id}', 'App\Http\Controllers\RegistrarController@studentEnroll')->name('student.enroll')->middleware('role:Registrar');
Route::get('student/enrolling-list', 'App\Http\Controllers\RegistrarController@studentUnenrollAll')->name('student.unenroll')->middleware('role:Registrar');
Route::patch('student/update/{id}', 'App\Http\Controllers\RegistrarController@studentUpdate')->name('student.update')->middleware('role:Registrar|Finance');
Route::get('student/update/units', 'App\Http\Controllers\RegistrarController@studentUpdateUnits')->name('student.updateUnits')->middleware('role:Registrar');

Route::get('students/promotion-list', 'App\Http\Controllers\RegistrarController@goTo_promotionList')->name('goTo_promotionList.index')->middleware('role:Registrar');
Route::get('student/promotion-list', 'App\Http\Controllers\RegistrarController@studentUnpromoteAll')->name('student.unpromote')->middleware('role:Registrar');


Route::get('enrollProgramme/{id}', 'App\Http\Controllers\RegistrarController@goTo_enrollProgramme')->name('goTo_enrollProgramme')->middleware('role:Registrar');
Route::get('enrollProgramme/edit/{id}', 'App\Http\Controllers\RegistrarController@enrollProgrammeEdit')->name('enrollProgramme.edit')->middleware('role:Registrar');
Route::post('enrollProgramme/store', 'App\Http\Controllers\RegistrarController@enrollProgrammeStore')->name('enrollProgramme.store')->middleware('role:Registrar');
Route::patch('enrollProgramme/update-status', 'App\Http\Controllers\RegistrarController@enrollProgrammeUpdate')->name('enrollProgramme.update')->middleware('role:Registrar');
Route::delete('enrollProgramme/delete/{id}', 'App\Http\Controllers\RegistrarController@enrollProgrammeDelete')->name('enrollProgramme.delete')->middleware('role:Registrar');

Route::get('student/courses', 'App\Http\Controllers\RegistrarController@goTo_courseProgramme')->name('goTo_courseProgramme')->middleware('role:Student|Finance|Registrar');
Route::get('student/courses/curriculum', 'App\Http\Controllers\RegistrarController@courseProgrammeShow')->name('courseProgramme.show')->middleware('role:Student|Finance|Registrar');


Route::resource('acadPeriods', App\Http\Controllers\AcadPeriodController::class)->middleware('role:Registrar');

Route::get('teacher', 'App\Http\Controllers\TeacherController@index')->name('teacher.list')->middleware('role:Teacher|Registrar');
Route::post('teacher', 'App\Http\Controllers\TeacherController@gradeReport')->name('teacher.report')->middleware('role:Registrar');

// Route::get('teacher/{id}/current-classes', 'App\Http\Controllers\TeacherController@classes')->name('teacher.classes')->middleware('role:Teacher|Registrar');
// Route::get('teacher/{id}/all-classes', 'App\Http\Controllers\TeacherController@allclasses')->name('teacher.allclasses')->middleware('role:Teacher|Registrar');
Route::get('teacher/{id}/search-class', 'App\Http\Controllers\TeacherController@goTo_classes')->name('teacher.goTo_classes')->middleware('role:Teacher|Registrar');
Route::get('teacher/classes', 'App\Http\Controllers\TeacherController@loadClasses')->name('teacher.loadClasses')->middleware('role:Teacher|Registrar');


Route::get('class/students', 'App\Http\Controllers\TeacherController@classStudents')->name('teacher.students')->middleware('role:Teacher|Registrar');
Route::patch('class/grade/{id}', 'App\Http\Controllers\TeacherController@classGradeUpdate')->name('classGrade.update')->middleware('role:Teacher');
Route::any('classes', 'App\Http\Controllers\RegistrarController@classOfferingsShow')->name('classOfferings.show')->middleware('role:Registrar');;


Route::get('student/{id}/grades', 'App\Http\Controllers\StudentController@grades')->name('grades.show')->middleware('role:Student|Finance|Registrar');
Route::post('student/{id}/balance', 'App\Http\Controllers\StudentController@balance')->name('balance.show')->middleware('role:Student|Finance|Registrar');

Route::any('classOffering', 'App\Http\Controllers\RegistrarController@goTo_classOfferings')->name('goTo_classOfferings')->middleware('role:Student|Registrar');
Route::get('student/prereg', 'App\Http\Controllers\RegistrarController@goTo_prereg')->name('goTo_prereg')->middleware('role:Student|Finance|Registrar');

Route::any('studentClass/add', 'App\Http\Controllers\RegistrarController@studentClassStore')->name('studentClass.store');
Route::delete('studentClass/drop', 'App\Http\Controllers\RegistrarController@studentClassDelete')->name('studentClass.delete');

Route::get('finance/index', 'App\Http\Controllers\FinanceController@index')->name('finance.index')->middleware('role:Finance');
Route::get('finance/add-payment/{id}', 'App\Http\Controllers\FinanceController@goTo_payment')->name('goTo_payment')->middleware('role:Finance');
Route::post('finance/add-payment/{id}', 'App\Http\Controllers\FinanceController@paymentStore')->name('payment.store')->middleware('role:Finance');
Route::get('finance/{id}/payments-history', 'App\Http\Controllers\FinanceController@paymentShow')->name('payment.show')->middleware('role:Finance');
Route::get('finance/payments', 'App\Http\Controllers\FinanceController@paymentsAll')->name('payments.all')->middleware('role:Finance');
Route::get('finance/update-dues', 'App\Http\Controllers\FinanceController@updateDues')->name('update.dues')->middleware('role:Finance');
Route::patch('finance/tag/{id}', 'App\Http\Controllers\FinanceController@updateEnrollTag')->name('update.enrollTag')->middleware('role:Finance|Registrar');
Route::get('finance/course-fees', 'App\Http\Controllers\FinanceController@coursefees')->name('finance.coursefees')->middleware('role:Finance');
Route::patch('finance/course-fees/update', 'App\Http\Controllers\FinanceController@coursefeesUpdate')->name('finance.coursefeesUpdate')->middleware('role:Finance');
Route::get('finance/course-fees/create', 'App\Http\Controllers\FinanceController@coursefeesCreate')->name('finance.coursefeesCreate')->middleware('role:Finance');
Route::post('finance/course-fees/store', 'App\Http\Controllers\FinanceController@coursefeesStore')->name('finance.coursefeesStore')->middleware('role:Finance');

Route::get('finance/{id}/balance', 'App\Http\Controllers\FinanceController@balance')->name('balance');

