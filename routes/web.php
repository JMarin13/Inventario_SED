<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Exports\ReportExport;

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

Route::resource('/', 'IndexController');

Route::get('/testdb', 'HomeController@testDBConection');

Route::resource('/workers', 'WorkerController')->middleware('auth');

Route::resource('/inventories', 'InventoryController')->middleware('auth');
// Route::resource('/workers/{worker}/inventories', 'InventoryController')->middleware('auth');

Route::get('/inventories/{inventory}', 'IndexController@show')->name('inventory.show');

Route::resource('/users', 'UserController')->middleware('auth');

Route::get('/reports', function()
{
    return (new ReportExport)->download('inventory.xlsx');
})->middleware('auth');

/* Route::get('/workers/{worker}/inventories/create', 'InventoryController@create');
Route::get('/workers/{worker}/inventories/{inventory}/edit', 'InventoryController@edit');
Route::post('/workers/{worker}/inventories', 'InventoryController@store');
Route::delete('/workers/{worker}/inventories/{inventory}', 'InventoryController@destroy')->name('inventories.destroy'); */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
