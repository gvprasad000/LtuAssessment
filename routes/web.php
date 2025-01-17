<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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


/*
Route::any('/{any}', function () {

    return view('welcome');

})->where([ 'any' => '.*' ]);*/

Auth::routes();
Route::get('/', 'AssessmentController@index')->where([ '/' => '.*' ]);
Route::post('/upload','AssessmentController@upload');
Route::get('files','AssessmentController@files');
Route::get('downloads', 'AssessmentController@downloadFileRequest');
Route::post('/saveoralcommunication','OralCommunicationController@saveOralCommunication');


