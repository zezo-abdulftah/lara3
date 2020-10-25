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




Route::get('/logg', 'front\zezo@logg')->name('zezo');

Route::get('/redirect/{service}', 'Soso@redirect');
Route::get('/callback/{service}', 'Soso@Callback');
Route::get('/offer', 'offercontrollre@offer');
Auth::routes(['verify'=>True]);



Route::group(
    ['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function(){

    Route::group(['prefix' => 'offers'], function () {
        Route::get('/create', 'offercontrollre@show')->name('show');
        Route::post('/store', 'offercontrollre@done')->name('done');
        Route::get('/all', 'offercontrollre@getoffers')->name('allOffers');
        Route::get('/edit/{offer_id}', 'offercontrollre@editoffet')->name('editOffer');
        Route::post('/update/{offer_id}', 'offercontrollre@updateoffet')->name('updateOffer');
        Route::get('/youtube', 'offercontrollre@giveViewers');
        Route::get('/delete/{offer_id}', 'offercontrollre@deleteoffet')->name('deleteOffer');
        Route::get('/sum', 'offercontrollre@sum')->name('sum');

    });
});
Route::group(
    ['prefix' => "ajax"], function() {

    Route::get('/crete', 'Ajaxcontroller@create')->name('restore');
    Route::get('/all', 'Ajaxcontroller@all')->name('all');
    Route::post('/insert', 'Ajaxcontroller@insert')->name('insert.ajax');
    Route::post('/delete', 'Ajaxcontroller@deleteoffet')->name('delete.ajax');
    Route::get('/edit/{id}', 'Ajaxcontroller@edit')->name('ajax.edit');
    Route::post('/update', 'Ajaxcontroller@update')->name('update.ajax');
});
Route::group(
    ['namespace'=>'Auth'/*,'middleware'=>'checkmiddle'*/], function() {
    Route::get('product', 'cuscontroller@product')->name('ajax.edit');
    });
Route::get('admin/login', 'Auth\logcontroller@showAdminLoginForm')->name('login');
Route::get('/admin', 'Auth\cuscontroller@welcomess')->name('sss')->middleware('auth:admin');
Route::post('admin/logg', 'Auth\logcontroller@checklogin')->name('saves');

Route::get('/home', 'HomeController@index')->name('home')->middleware("verified");
Route::get('/', function (){
    return "home";
});
