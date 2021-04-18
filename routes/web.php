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

Route::get('/', function () {
    return view('home');
});


Route::prefix('users')->group(function () {
    Route::get('list', 'UserController@viewList')->name('users.list');
    Route::get('add', 'UserController@viewAdd')->name('users.add');
    Route::get('edit', 'UserController@viewEdit')->name('users.edit');
});



Route::prefix('cases')->group(function () {
    Route::get('list/{mode}', 'CasesController@viewList')->name('cases.list');
    Route::get('add/{mode}', 'CasesController@viewAdd')->name('cases.add');
    Route::get('edit/{mode}/{id}', 'CasesController@viewEdit')->name('cases.edit');
});

Route::prefix('specialcards')->group(function () {
    Route::get('list/{mode}', 'SpecialCardController@viewList')->name('specialcards.list');
    Route::get('add/{mode}', 'SpecialCardController@viewAdd')->name('specialcards.add');
    Route::get('edit/{mode}/{id}', 'SpecialCardController@viewEdit')->name('specialcards.edit');
});


