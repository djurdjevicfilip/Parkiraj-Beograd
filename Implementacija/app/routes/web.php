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

/** Add index route
 *  Also, restrict access to index page to logged in users by using the 'guest' middleware
 */
Route::get('/', 'PagesController@index')->middleware('guest')->name('index');

/* Routes needed for authentication */
Auth::routes();

/* Passing parameters to UsersController update function */
Route::put('users/{id}/{act?}', 'UsersController@update');

Route::delete('users/{id}/delete','UsersController@delete');

/* Activate moderator */
Route::put('mod/{id}', 'AdministrationController@activate');

/** Restricting access based on user type 
 * 
 * Made UserMiddleware and AdminMiddleware, and added it to Kernel.php 
*/
Route::group(['middleware' => ['auth', 'user']], function() {
    Route::get('/home', 'HomeController@user')->name('home');
});
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/admin', 'HomeController@admin')->name('admin');
});
Route::group(['middleware' => ['auth', 'mod']], function() {
    Route::get('/mod', 'HomeController@mod')->name('mod');
});
//Locations post
Route::post('/locations','LocationsController@store');

Route::post('/passchange','UsersController@passchange');

//Redirect back when login is requested
Route::get('/login',function() { return redirect()->back();})->name('login');

/** Redirect back if the page doesn't exist
 * Otherwise it throws an error
*/
Route::any('{query}', 
  function() { return redirect()->back(); })
  ->where('query', '.*');
