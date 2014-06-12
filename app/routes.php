<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
//    User::create([
//                    'first'=>'Juanita',
//                    'last'=>'Flores',
//                    'rut'=>'10.234.234-3',
//                    'email'=>'jflo@gmail.com',
//                    'phone'=>'(345)-344-2345',
//                    'notes'=>'',
//                    'username'=>'jflo',
//                    'remember_token'=>'',
//                    'password'=>Hash::make('jflo123'),
//                    'usertypes_id'=>1
//                    ]);
//    return 'Done';
});

// Route::get('/dbmigrate', 'DbmigrateController@index');
Route::get('users',function(){
    $users = User::find(6);
    return $users->first;
});
Route::get('login','SessionsController@create');
Route::get('logout','SessionsController@destroy');
Route::resource('sessions','SessionsController');
Route::get('admin',function(){
    return 'Admin page';
})->before('auth');