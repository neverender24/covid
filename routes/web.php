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

use App\Barangay;
use App\Tally;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('tally', 'TallyController');

Route::get('get-barangays',function(){
    $municipality_id = Input::get('municipality_id');

    $subs = Barangay::where('idmun','=',$municipality_id)->get();

    return Response::json($subs);
});

Route::get('get-totals',function(){
    $municipality_id = Input::get('municipality_id');

    $subs = Tally::selectRaw('SUM(pui) as pui,SUM(pum) as pum,SUM(confirmed) as confirmed,SUM(death) as death,SUM(recovered) as recovered, barangays.brgyname')
    ->leftJoin('barangays','tallies.barangay_id', '=', 'barangays.id')
    ->where('municipality_id','=',$municipality_id)->groupBy('barangay_id')->get();

    return Response::json($subs);
});