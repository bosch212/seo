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
    return view('welcome');
});

Route::get('/home', function () {
    return view('pages.admin.index');
});

// Admin
Route::prefix('admin')
    ->namespace('Admin')
    ->group(function (){
        Route::get('/category', 'CategoryController@index')->name('category-index');
        Route::get('/category/create', 'CategoryController@create')->name('category-create');
        Route::post('/category', 'CategoryController@store')->name('category-store');
        Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category-edit');
        Route::put('/category/{id}', 'CategoryController@update')->name('category-update');
        Route::put('/category', 'CategoryController@update')->name('category-update');
        Route::delete('/category/{id}', 'CategoryController@delete')->name('category-delete');

        Route::resource('/tag', 'TagController');
        Route::resource('/post', 'PostController');
    });
