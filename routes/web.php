<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//DB::listen(function ($event) {
//    dump($event->sql);
//});

Route::get('/',   [ 'uses' => 'ExportController@welcome', 'as' => 'home'] );
Route::get('view',   [ 'uses' => 'ExportController@viewStudents', 'as' => 'view'] );
Route::get('export', [ 'uses' => 'ExportController@export', 'as' => 'export'] );

Route::post('exportstudents', [ 'uses' => 'ExportController@exportStudentsToCSV', 'as' => 'exportstudents'] );
Route::get('exportstudents', [ 'uses' => 'ExportController@welcome', 'as' => 'exportstudents'] );

Route::post('exportcourses', [ 'uses' => 'ExportController@exporttCourseAttendenceToCSV', 'as' => 'exportcourses'] );
Route::get('exportcourses', [ 'uses' => 'ExportController@viewAttendence', 'as' => 'exportcourses'] );

