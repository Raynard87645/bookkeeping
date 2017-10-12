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


//create controller for pages
Route::get('home', 'HomeController@homePage');

Route::get('/','PagesController@index');

Route::get('blade', 'PagesController@blade');

Route::get('users', 'userController@index')->middleware('auth');
Route::get('users/create', ['uses' => 'userController@create']);
Route::post('users', ['uses' => 'userController@store']);







// creates user login
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{username}', 'profileController@profile');

Route::resource('articles', 'articlesController');
Route::get('/articles/myblogs/{username}', 'articlesController@myblogs');

Route::resource('dashboard', 'dashboardController');
Route::resource('items', 'itemsController');
Route::get('items', 'itemsController@index')->middleware('auth');
Route::post('items/import', 'itemsController@import')->middleware('auth');
Route::get('items/export/{username}', 'itemsController@export')->middleware('auth');

Route::resource('sales', 'salesController');
Route::get('sales', 'salesController@index');
Route::post('sales/import', 'salesController@import');
Route::get('sales/export', 'salesController@export');

Route::resource('payrollsetup', 'payrollsetupController');
Route::resource('setup', 'setupController');
Route::resource('deposits', 'depositsController');
Route::resource('employees', 'employeesController');
Route::get('employees/salary/{id}', 'employeesController@salary');
Route::get('employees/vacation/{id}', 'employeesController@vacation');
Route::get('employees/leave/{id}', 'employeesController@leave');
Route::get('employees/tax/{id}', 'employeesController@tax');
Route::get('employees/benefits/{id}', 'employeesController@benefits');
Route::get('employees/files/{id}', 'employeesController@files');
Route::get('employees/deposits/{id}', 'employeesController@deposits');
Route::get('employees/status/{id}', 'employeesController@status');

Route::resource('taxes', 'taxesController');
Route::resource('taxform', 'taxformController');
Route::resource('timesheets', 'timesheetsController');







/*Route::get('uploads', 'fileUpLoadController@index');
Route::post('uploads/sales', 'fileUpLoadController@sales');
Route::post('uploads', 'fileUpLoadController@items');
Route::post('items', 'fileUpLoadController@image');
Route::get('uploads/export', 'fileUpLoadController@export');*/


/*Route::group(['middleware' => 'web'], function () {
  Route::get('fileUpload', function () {
        return view('fileUpload');
    });
    Route::post('fileUpload', ['as'=>'fileUpload','uses'=>'HomeController@fileUpload']);
});*/

/*Route::get('articles', 'articlesController@index');
Route::get('articles', ['uses' => 'articlesController@store']);
Route::get('articles/create', ['uses' => 'articlesController@create']);
Route::get('articlesarticles/{$articles->id}',['uses' => 'articlesController@show']);
Route::get('articles/{$articles->id}', ['uses' => 'articlesController@update']);
Route::get('articles/{$articles->id}', ['uses' => 'articlesController@destroy']);
Route::get('articles/{$articles->id}/edit', ['uses' => 'articlesController@edit']);*/

/*Route::get('users', function () {
     $users =[
      '0' => ['First_Name' => 'Raynard',
              'Last_Name' => 'Henry',
              'Location'  => 'Jamaica'
           ],
       '1' => ['First_Name' => 'George',
              'Last_Name' => 'Henry',
              'Location'  => 'Jamaica'
           ]

    ];
    return $users;

});*/
/*Route::get('/', function () {
  //return realpath(base_path('resources/views'));
    return view('welcome');
});
*/