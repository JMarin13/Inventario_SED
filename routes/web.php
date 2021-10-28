<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', 'WorkerController@index');

Route::get('/testdb', 'HomeController@testDBConection');

Route::resource('/workers', 'WorkerController');

// Route::resource('/inventories', 'InventoryController');

Route::get('/workers/{worker}/inventories/create', 'InventoryController@create');
Route::get('/workers/{worker}/inventories/{inventory}/edit', 'InventoryController@edit');
Route::post('/workers/{worker}/inventories', 'InventoryController@store');
Route::delete('/workers/{worker}/inventories/{inventory}', 'InventoryController@destroy')->name('inventories.destroy');