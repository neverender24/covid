<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tally', 'TallyController');

Route::get('get-municipalities', 'MunicipalityController@getAllMunicipalities');
Route::post('get-barangays', 'BarangayController@getAllBarangays');