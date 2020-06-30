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

Route::get('/success', [
    'as'   => 'success',
    'uses' => 'HomeController@success'
]);

// User
Route::prefix('/userdashboard')->middleware('usercheck')->group(function() {
    Route::get('/', [
        'as'   => 'userIndex',
        'uses' => 'ProductController@personalBids'
    ]);

    Route::get('/changePassword', [
        'as'   => 'changePassword',
        'uses' => 'UserController@changePassword'
    ]);

    Route::post('/changePassword', [
        'as'   => 'changePassword',
        'uses' => 'UserController@handleChangePassword'
    ]);
});

// Admin
Route::prefix('/admindashboard')->middleware('admincheck')->group(function() {
    Route::get('/', [
        'as'   => 'adminIndex',
        'uses' => 'HomeController@adminIndex'
    ]);

    Route::get('/bids', [
        'as'   => 'bids',
        'uses' => 'ProductController@allBids'
    ]);

    Route::get('/products/details/{slug}', [
        'as'   => 'detailsProduct',
        'uses' => 'ProductController@adminDetails'
    ]);

    Route::get('/products/change/{slug?}', [
        'as'   => 'changeProduct',
        'uses' => 'ProductController@change'
    ]);

    Route::post('/products/change/{slug?}', [
        'as'   => 'changeProduct',
        'uses' => 'ProductController@handleChange'
    ]);

    Route::post('/products/delete/{id}', [
        'as'   => 'deleteProduct',
        'uses' => 'ProductController@handleDelete'
    ]);
});

Auth::routes();