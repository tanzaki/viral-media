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

use App\Gag;
use Illuminate\Http\UploadedFile;

Route::get('/', function(){
    return view('gag.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/', function(){
//    https://laravel.com/docs/5.4/requests#files
    /** @var UploadedFile $user_file_media */
    $user_file_media = request()->user_file_media;
    $path = $user_file_media->store('public/images');
    //image was stored to 'storage/app/public/images' directory
    $new_gag = new Gag();
    $new_gag->type = str_random(10);
    $new_gag->media_source = $path;
    $new_gag->title = str_random(10);
    $new_gag->save();
    dd(Gag::all());
});
