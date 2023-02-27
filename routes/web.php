<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::group(['prefix'=>"admin",'as' => 'admin.','namespace' => 'App\Http\Controllers\Admin','middleware' => 'AdminPanelAccess'], function () {

        Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

        Route::resource('/users', 'UserController');
        Route::resource('/roles', 'RoleController');
        Route::resource('/users', 'UserController');
        Route::post('/profile/{id}','UserController@profileUpdate')->name('profileupdate');
        Route::get('/profile/{id}','UserController@editprofile')->name('profile');
        Route::resource('/permissions', 'PermissionController')->except(['show']);

    });

            Route::post('/planning/publish','App\Http\Controllers\PlanningController@publish')->name('planning.publish');
            Route::post('/plannings/generate', 'App\Http\Controllers\PlanningController@planifierSoutenances')->name('planifie');
            Route::post('/profile/{id}','UserController@profileUpdate')->name('profileupdate');
            Route::get('/profile/{id}','UserController@editprofile')->name('profile');
            Route::get('/planning/{id}/pv', 'App\Http\Controllers\PlanningController@generatePV')->name('generate');
            Route::post('plannings/{id}/mention', 'App\Http\Controllers\PlanningController@genererMention')->name('plannings.mention');
            Route::put('/projects/{project}/validate', 'App\Http\Controllers\ProjectController@validateproject')->name('projects.validate');
            Route::resource('/plannings', 'App\Http\Controllers\PlanningController');
            Route::resource('/dachboards', 'App\Http\Controllers\DashboardController');
            Route::resource('/projects', 'App\Http\Controllers\ProjectController');
            Route::resource('/soutenances', 'App\Http\Controllers\SoutenanceController');
            Route::put('/approve/{id}','App\Http\Controllers\SoutenanceController@approve')->name('approve');
            Route::put('/avis/{id}','App\Http\Controllers\SoutenanceController@avis')->name('avis');
            Route::group(['prefix' => 'messages'], function () {
            Route::get('/', ['as' => 'messages', 'uses' => 'App\Http\Controllers\MessagesController@index']);
            Route::get('create', ['as' => 'messages.create', 'uses' => 'App\Http\Controllers\MessagesController@create']);
            Route::post('/', ['as' => 'messages.store', 'uses' => 'App\Http\Controllers\MessagesController@store']);
            Route::get('{id}', ['as' => 'messages.show', 'uses' => 'App\Http\Controllers\MessagesController@show']);
            Route::put('{id}', ['as' => 'messages.update', 'uses' => 'App\Http\Controllers\MessagesController@update']);
            Route::delete('{id}', ['as' => 'messages.destroy', 'uses' => 'App\Http\Controllers\MessagesController@destroy']);


});
});
Route::post('/logout', function (Illuminate\Http\Request $request) {
    $redirectUrl = $request->query('redirect');

    Auth::logout();

    return redirect($redirectUrl ?? route('login'));
})->name('logout');
