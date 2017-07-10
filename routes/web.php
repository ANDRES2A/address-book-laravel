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


/*Route::get('/redirect','FacebookInt@redirect');
Route::get('/','FacebookInt@login');
Route::get('public/callback','FacebookInt@callback');
Route::get('/posts','PostsController@showPostForm');
Route::post('/insertPost','PostsController@store');
Route::get('/like','PostsController@like');
Route::get('/contacts','contacts@getContacts');
Route::post('/contacts','contacts@store');*/
Route::get('/', 'contacts@getAddressBook');
Route::get('/addressBook','contacts@getAddressBook');
/*Route::get('contact',
  ['as' => 'contact', 'uses' => 'AboutController@create']);
Route::post('contact',
  ['as' => 'contact_store', 'uses' => 'AboutController@store']);*/
