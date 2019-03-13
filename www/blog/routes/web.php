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
        Route::get('/create_links', 'ProfileMy\My@formLinks')->name('form_links');
        Route::post('/create_links', 'ProfileMy\My@linksPost')->name('links_post');
        Route::get('/list_links', 'ProfileMy\My@listLinks')->name('list_links');
    });
Route::get('/{short_link}', 'RedirectLink@redirectToLongLink')->name('redirect.page');
