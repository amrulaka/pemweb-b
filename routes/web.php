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
Route::get('helloworld', function()
{
return "hello world from laravel framework";
});

Route::get('motor/{jenis}',function($jenis){
  return "Motor dengan jenis : ".$jenis;
  });

Auth::routes();

Route::resource('/quotes', 'QuoteController', ['only' => 'index']);

Route::group(['middleware' => 'auth'], function ()
{
  Route::resource('/quotes', 'QuoteController', ['except' => 'index','show']);

});
