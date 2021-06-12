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

Route::get('/', 'StudentController@index');
Route::get('/edit','StudentController@edit');
Route::get('/add-mark','StudentController@add_marks');

Route::get('/get-mark','StudentController@get_marks');

Route::get('/get-allmark','StudentController@get_all_marks');

Route::post('/save-student',['as'=>'save-student','uses'=>'StudentController@save_student']);
Route::post('/delete-student',['as'=>'delete-student','uses'=>'StudentController@delete_student']);
Route::post('/update-mark',['as'=>'update-mark','uses'=>'StudentController@update_marks']);
