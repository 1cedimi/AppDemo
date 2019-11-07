<?php

Route::get('/', function () {
  return view('home');
});

Route::resource('charts', 'ChartController');
Route::post('/charts/{chart}/datasets', 'ChartDatasetController@store');

Auth::routes();