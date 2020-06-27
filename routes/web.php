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

Route::get('/', [
    'as'   => 'home',
    'uses' => 'ProductController@index'
]);

Route::get('/product/{slug}', [
    'as'   => 'home',
    'uses' => 'ProductController@details'
]);

Route::post('/product/{slug}', [
    'as'   => 'home',
    'uses' => 'ProductController@handleBid'
]);

// User
Route::prefix('/userdashboard')->middleware('usercheck')->group(function() {
    Route::get('/', [
        'as'   => 'userIndex',
        'uses' => 'HomeController@userIndex'
    ]);
});

// Admin
Route::prefix('/admindashboard')->middleware('admincheck')->group(function() {
    Route::get('/', [
        'as'   => 'adminIndex',
        'uses' => 'HomeController@adminIndex'
    ]);
});

Auth::routes();