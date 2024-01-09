<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/students', 'StudentController@index')->name('students.list');
Route::get('/students/add', 'StudentController@add')->name('students.add');
Route::post('/students/add', 'StudentController@add')->name('students.add');
Route::post('/students/store', 'StudentController@store')->name('students.store');
Route::get('/students/edit/{id}', 'StudentController@edit')->name('students.edit');
Route::post('/students/edit/{id}', 'StudentController@edit')->name('students.edit');
Route::post('/students/update/{id}', 'StudentController@update')->name('students.update');
Route::get('/students/delete/{id}', 'StudentController@delete')->name('students.delete');

Route::get('/batches', 'BatchController@index')->name('batches.list');
Route::get('/batches/add', 'BatchController@add')->name('batches.add');
Route::post('/batches/add', 'BatchController@add')->name('batches.add');
Route::post('/batches/store', 'BatchController@store')->name('batches.store');
Route::get('/batches/edit/{id}', 'BatchController@edit')->name('batches.edit');
Route::post('/batches/edit/{id}', 'BatchController@edit')->name('batches.edit');
Route::post('/batches/update/{id}', 'BatchController@update')->name('batches.update');
Route::get('/batches/delete/{id}', 'BatchController@delete')->name('batches.delete');


Route::get('/schedules', 'ScheduleController@index')->name('schedules.list');
Route::get('/schedules/add', 'ScheduleController@add')->name('schedules.add');
Route::post('/schedules/add', 'ScheduleController@add')->name('schedules.add');
Route::post('/schedules/store', 'ScheduleController@store')->name('schedules.store');
Route::get('/schedules/edit/{id}', 'ScheduleController@edit')->name('schedules.edit');
Route::post('/schedules/edit/{id}', 'ScheduleController@edit')->name('schedules.edit');
Route::post('/schedules/update/{id}', 'ScheduleController@update')->name('schedules.update');
Route::get('/schedules/delete/{id}', 'ScheduleController@delete')->name('schedules.delete');

Route::get('/attendances', 'AttendanceController@index')->name('attendances.list');
Route::post('/attendances', 'AttendanceController@index')->name('attendances.list');
Route::post('/attendances/createAll', 'AttendanceController@createAll')->name('attendances.createAll');
Route::get('/attendances/createAll', 'AttendanceController@createAll')->name('attendances.createAll');
Route::post('/attendances/update/{stundent_id}/{attendance_date}', 'AttendanceController@update')->name('attendances.update');
Route::post('/attendances/undo/{student_id}/{attendance_date}', 'AttendanceController@undo')->name('attendances.undo');


Route::post('/attendances/store', 'AttendanceController@store')->name('attendances.store');
Route::get('/attendances/edit/{id}', 'AttendanceController@edit')->name('attendances.edit');
Route::post('/attendances/edit/{id}', 'AttendanceController@edit')->name('attendances.edit');
Route::post('/attendances/update/{id}', 'AttendanceController@update')->name('attendances.update');
Route::get('/attendances/delete/{id}', 'AttendanceController@delete')->name('attendances.delete');

Route::get('/report', 'ReportController@index');
Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
