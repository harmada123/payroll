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
    return view('welcome');
});

Auth::routes();


Route::group(['middleware'=>'admin'],function (){
    Route::resource('admin','AdminUsersController');
    Route::resource('jobs','AdminJobsController');
    Route::resource('department','AdminDepartmentsController');
    Route::resource('users','UsersController');
    Route::get("my-search","SearchQuery@mySearch");
});
Route::group(['middleware'=>'payroll'],function () {
    Route::resource('payroll', 'PayrollController');
    Route::get("search","PayrollSearch@mySearch");
    Route::post('data','PayrollDataController@store');
});

Route::get('/home', 'HomeController@index')->name('home');

