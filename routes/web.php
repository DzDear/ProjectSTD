<?php

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
    return redirect('/home');   // redirect เป็นการบังคับวิ่งเข้าหน้า web
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()

  {

    Route::get('/maindata/register', 'UserController@register')->name('regist');
    Route::post('/maindata/saveregister', 'UserController@Saveregister')->name('Saveregist');

    Route::get('/maindata/view', 'UserController@index')->name('ViewMaindata');
    Route::get('/maindata/edit/{id}', 'UserController@edit')->name('maindata.edit');
    Route::patch('/maindata/update/{id}', 'UserController@update')->name('maindata.update');
    Route::delete('/maindata/delete/{id}', 'UserController@destroy')->name('maindata.destroy');

    route::resource('import','ImportController');
    Route::post('import', 'ImportController@Import')->name('import');

    route::resource('SeacrhStudent','StudentController');
    Route::get('/begin/view/', 'BeginController@index')->name('Begin');

    // route::resource('dbcheckstudent','DatastudentController');
    Route::get('/datastudent/view/', 'DatastudentController@indexView')->name('DataStudent');
    Route::post('/datastudent/datastudent/{type}', 'DatastudentController@SaveDatastudent')->name('SaveDatastudent');
    //แสดงนักเรียนทั้งหมด
    Route::get('/datastudent/checkstudent/{type}', 'DatastudentController@index')->name('Checkstuednt');


    Route::get('/student/view/{type}', 'StudentController@index')->name('ViewStudent');
    Route::get('/student/create/{type}', 'StudentController@create')->name('student.create');
    Route::get('/student/edit/{id}/{type}', 'StudentController@edit')->name('student.edit');

    Route::delete('/student/delete/{id}', 'StudentController@destroy')->name('student.destroy');
    Route::post('/student/store', 'StudentController@store')->name('student.store');
    Route::patch('/student/update/{id}', 'StudentController@update')->name('student.update');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/{name}', 'HomeController@index')->name('index');

  });
    Route::get('/teacher','TeacherController@index')->name('teacher.studentall');
