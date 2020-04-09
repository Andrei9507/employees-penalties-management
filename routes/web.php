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
    return view('home');
});



 
Auth::routes();


Route::get('get-employee/{id}', function($id){
	return App\Models\Employee::find($id)->firstname;
});
Route::get('get-penalty/{id}', function($id){
	return App\Models\Behavior::find($id)->penalty;
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/home', 'EmployeeController@chooseEmployee')->name('home');
	Route::resource('penalties','PenaltyController');
	Route::resource('users','UserController');
	Route::resource('behaviors','BehaviorController');
	Route::get('employees/{id}/penalty', 'EmployeeController@createpenalty')->name('employees.createpenalty');
	Route::post('employees/{id}/penalty', 'EmployeeController@storePenalty')->name('employees.storePenalty');
	Route::get('notifications', 'EmployeeController@listNotifications')->name('employees.listNotifications');
	Route::get('users', 'UserController@validPenltyOnCurrentUser')->name('users.penalty');
	Route::get('deleteNotifications/{id}',array('uses' => 'EmployeeController@deleteNotifications', 'as' => 'employees.deleteNotifications'));
	Route::get('updateNotifications/{id}',array('uses' => 'EmployeeController@updateNotifications', 'as' => 'employees.updateNotifications'));
 });
	Route::resource('employees','EmployeeController');
