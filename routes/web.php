<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tally', 'TallyController');

Route::get('get-municipalities', 'MunicipalityController@getAllMunicipalities');
Route::get('daily-municipality', 'ReportController@dailyMunicipality');
Route::post('get-barangays', 'BarangayController@getAllBarangays');
Route::post('check-barangay-encoded', 'TallyController@checkBarangayEncoded');
Route::get('charts-province', 'ReportController@chartsProvince');
Route::get('charts-daily', 'ReportController@chartsDaily');