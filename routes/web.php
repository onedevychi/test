<?php

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
Route::get('/', function () {
  $visited = DB::select('select * from places where visited = ?', [1]); 
  $togo = DB::select('select * from places where visited = ?', [0]);

  return view('travel_list', ['visited' => $visited, 'togo' => $togo ] );
});
*/

Route::get('/admin', function(){
  return view('admin');
})->name('admin');

Route::get('/admin-update', function(){
  return view('admin-update');
})->name('admin-update');

Route::get('/view/{id}/delete', 'ContactController@deleteMessage')->name('contact-delete');
Route::get('/', 'ContactController@alldata')->name('contact-data');
Route::get('/view/{id}', 'ContactController@showOneMessage')->name('contact-data-one');
Route::get('/view/{id}/update', 'ContactController@updateMessage')->name('contact-update');
Route::get('/view', 'ContactController@alldataAdmin')->name('contact-data-admin');
//Route::get('/{id}/update', 'ContactController@updateMessage')->name('contact-update');
Route::post('/contact/submit', 'ContactController@submit')->name('contact-form');
Route::post('/view/{id}/update', 'ContactController@updateMessageSubmit')->name('contact-update-submit');


//CREATE TABLE users_posts (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255) NOT NULL, position VARCHAR(300), birthday DATE NOT NULL);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
