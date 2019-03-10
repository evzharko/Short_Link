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

Auth::routes();


/*
 * Личный кабинет
 * */
Route::middleware(['my'])
    ->prefix('my')
    ->group(function (){
        Route::get('/', 'HomeController@index')->name('my');
        Route::any('/create_links', 'ProfileMy\My@createLinks')->name('create_links');
        Route::get('/list_links', 'ProfileMy\My@listLinks')->name('list_links');
    });
Route::get('/{short_link}', 'RedirectLink@redirectToLongLink')->name('redirect.page');
