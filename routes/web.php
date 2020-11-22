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
    return view('login');
});


Route::get('/login', ['uses'=>'HCPController@loadLogin', 'as'=>'login']);
Route::get('/principalprofile/{id}', 'HCPController@principalprofile');
Route::get('/agentprofile/{id}', 'HCPController@agentprofile');
Route::get('/agents', 'HCPController@agents');
Route::get('/reports', 'HCPController@reports');
Route::get('/vreports', 'HCPController@vreports');
Route::get('/files', 'HCPController@files');
Route::get('/home', 'HCPController@home');
Route::get('/products', 'HCPController@products');



Route::post('/adddependant', 'HCPController@addDependantToPrincipal');
Route::post('/login', 'HCPController@login');
Route::post('/searchmember', 'HCPController@searchmember');
Route::post('/addagent', 'HCPController@addagent');
Route::post('/searchagent', 'HCPController@searchagent');
Route::post('/editdependant', 'HCPController@editdependant');

Route::post('/editDependantByPrincipal', 'HCPController@editDependantByPrincipal');
Route::post('/principalprofile/editDependantByPrincipal', 'HCPController@editDependantByPrincipal');


Route::post('/deleteDependantByPrincipal', 'HCPController@deleteDependantByPrincipal');
Route::post('/principalprofile/deleteDependantByPrincipal', 'HCPController@deleteDependantByPrincipal');
Route::post('/editAgent', 'HCPController@editAgent');
Route::post('/editagentdata', 'HCPController@editagentdata');
Route::post('/addProduct', 'HCPController@addProduct');

Route::post('/viewProduct', 'HCPController@viewProduct');


Route::post('/registermemberAjax', 'HCPController@registermember');








Route::get('/sics', 'HCPController@sics');
Route::get('/createbusiness', 'HCPController@createbusiness');

Route::post('/createclaim', 'HCPController@createclaim');
Route::post('/createbusiness', 'HCPController@createbusinessPost');



//Route::post('/createclaim', 'HCPController@createclaim');






