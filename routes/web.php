<?php

use App\Http\Controllers\LoginController;
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


    


Route::middleware(['auth'])->group(function () {
    
    Route::prefix('users')->group(function () {
        Route::get('list', 'UserController@viewList')->name('users.list');
        Route::get('add', 'UserController@viewAdd')->name('users.add');
        Route::get('edit', 'UserController@viewEdit')->name('users.edit');
    });
    
    Route::get('/dashboard', function () {
        return view('home');

    })->name('home');

    Route::prefix('cases')->group(function () {
        Route::get('list/{mode}', 'CasesController@viewList')->name('cases.list');
        Route::get('add/{mode}', 'CasesController@viewAdd')->name('cases.add');
        Route::get('edit/{mode}/{id}', 'CasesController@viewEdit')->name('cases.edit');
    
        Route::post('edit/{mode}/{id}', 'CasesController@editCard')->name('cases.edit');
        Route::post('add/{mode}', 'CasesController@addCard')->name('cases.add');
        Route::get('remove/{mode}/{id}', 'CasesController@removeCard')->name('cases.remove');
    });
    
    Route::prefix('specialcards')->group(function () {
        Route::get('list/{mode}', 'SpecialCardController@viewList')->name('specialcards.list');
        Route::get('add/{mode}', 'SpecialCardController@viewAdd')->name('specialcards.add');
        Route::get('edit/{mode}/{id}', 'SpecialCardController@viewEdit')->name('specialcards.edit');
    });
    
    Route::get('logout', 'LogoutController@logout')->name('login.logout');



});


    
Route::get('forgot', function () {
    return view('forgot');
});

Route::get('login', 'LoginController@index')->name('login');
Route::post('login', 'LoginController@authenticate')->name('login.authenticate');