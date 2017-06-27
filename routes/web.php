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

use Illuminate\Http\UploadedFile;

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/', function(){
//    https://laravel.com/docs/5.4/requests#files
    /** @var UploadedFile $user_file_media */
    $user_file_media = request()->user_file_media;
    dd($user_file_media);
});
