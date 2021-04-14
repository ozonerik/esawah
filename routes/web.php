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
    return redirect()->route('login');
});


Auth::routes(['verify' => true]);

//auth user
Route::get('/home', 'HomeController@index')->name('home');

//auth and verified
Route::middleware([ 'auth', 'verified'])->group(function () {
  
  //All Access Auth
  Route::get('/myprofile/{id}', 'OptionsController@myprofile')->name('myprofile')->middleware('password.confirm');
  Route::post('/myprofile/update/{id}', 'OptionsController@updateprofile')->name('updateprofile');
  Route::get('/myprofile/upgrade/{id}', 'OptionsController@upgradeprofile')->name('upgradeprofile');
  Route::get('/myprofile/cancel-upgrade/{id}', 'OptionsController@cancelupgradeprofile')->name('cancelupgradeprofile');
  
  //isAdmin
  Route::middleware([ 'can:isAdmin'])->group(function () {
          Route::get('/userlist', 'OptionsController@userlist')->name('userlist');
          Route::delete('/userlist/dels', 'OptionsController@deluser')->name('deluser');
          Route::delete('/userlist/del', 'OptionsController@delsingleuser')->name('delsingleuser');
          Route::post('/userlist/upg', 'OptionsController@upguser')->name('upguser');
          Route::post('/userlist/upd', 'OptionsController@updatesingleuser')->name('updsingleuser');
  });
  
  //isAdmin and isPro
  Route::middleware(['can:isAdminOrPro'])->group(function () {
          Route::get('/pawongan/{id}', 'PawonganController@pawongan')->name('pawongan');
          Route::delete('/pawongan/dels', 'PawonganController@delpawongan')->name('delpawongan');
          Route::delete('/pawongan/del', 'PawonganController@delsinglepawongan')->name('delsinglepawongan');
  });

});


