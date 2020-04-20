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

Route::get('/', 'TodosController@index');

Auth::routes();
Route::get('todos/{todo}/complete', 'LinksController@complete');
Route::get('/todos/completed', 'LinksController@completedTodos');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('todos', 'TodosController');