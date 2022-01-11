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
    return view('welcome');
});

/*Route::get('/folders', function () {
    return view('folders.index');
});*/

Route::get('/insights', function () {
    return view('insights.index');
});

Route::get('/destroydoc', array (
    'as' => 'destroy_doc',
    'uses' => 'FilesController@destroyDoc'
));

Route::get('/doccategory', array (
    'as' => 'category_doc',
    'uses' => 'FilesController@categoryDoc'
));

Route::get('/docconcept', array (
    'as' => 'concept_doc',
    'uses' => 'FilesController@conceptDoc'
));

Route::get('/docsentiment', array (
    'as' => 'sentiment_doc',
    'uses' => 'FilesController@sentimentDoc'
));

Route::get('/lengnatural', array (
    'as' => 'leng_natural',
    'uses' => 'FilesController@lengNatural'
));

Route::get('/lengnaturaladvanced', array (
    'as' => 'leng_natural_advanced',
    'uses' => 'FilesController@lengNaturalAdvanced'
));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::post('/newregister', 'AuthController@register');
//Route::post('/loging', 'AuthController@register');
Route::resource('folders', 'FoldersController');
Route::resource('files', 'FilesController');



