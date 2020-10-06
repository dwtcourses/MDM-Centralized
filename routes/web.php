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


use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


Auth::routes();
/* CoreUI templates */

Route::middleware('role_administrator')->group(function() {
    Route::view('/', 'panel.dashboard');
    Route::get('/','dashboardController@index');
    Route::view('/masterInput', 'panel.home');
    Route::post('insert_data', 'InsUpdController@proses_mdm');
    Route::view('/showMaster','showMaster');
    Route::get('/showMaster','showMasterController@index');
    Route::post('mail', 'InsUpdController@InsertData');

    Route::view('pentaho_ins','pentaho_ins');
    Route::view('pentaho_upd','pentaho_upd');

    Route::get('/masterInput','infoController@info');

    Route::get('viewMeta/{id}','metadataController@viewMeta');
    Route::view('meta','meta');
   Route::get('history/update/{created_at}','histoController@hisUp');
   Route::get('history/insert/{created_at}','histoController@viewHis');

    Route::group(['prefix' => 'laravel-crud-search-sort'], function () {
        Route::get('/', 'showMasterController@index');

    });

});
Route::middleware('role')->group(function(){
    Route::view('/adminEreg/home', 'panel.dashboard');
    Route::get('/adminEreg/home','dashboardController@index');
    Route::view('/adminEreg/showMaster','showMaster');
    Route::get('/adminEreg/showMaster','showMasterController@index');
    Route::get('/adminEreg/viewMeta/{id}','metadataController@viewMeta');
    // Route::get('history/update/{created_at}','histoController@hisUp');
    // Route::get('history/insert/{created_at}','histoController@viewHis');
    Route::view('bmdtp/chart','bmdtp.chart');
});
Route::middleware('role_ijepa')->group(function(){
    Route::view('/adminAsrot/home', 'panel.dashboard');
    Route::view('/adminAsrot/showMaster','showMaster');
    Route::get('/adminAsrot/showMaster','showMasterController@index');
    Route::get('/adminAsrot/viewMeta/{id}','metadataController@viewMeta');
    // Route::get('history/update/{created_at}','histoController@hisUp');
    // Route::get('history/insert/{created_at}','histoController@viewHis');
    Route::view('ijepa/chart','ijepa.chart');
});

Route::middleware('role_lcgc')->group(function(){
    Route::view('/adminEtrack/home', 'panel.dashboard');
    Route::get('/adminEtrack/home','dashboardController@index');
    Route::view('/adminEtrack/showMaster','showMaster');
    Route::get('/adminEtrack/showMaster','showMasterController@index');
    Route::get('/adminEtrack/viewMeta/{id}','metadataController@viewMeta');
    // Route::get('history/update/{created_at}','histoController@hisUp');
    // Route::get('history/insert/{created_at}','histoController@viewHis');
    Route::view('lcgc/chart','lcgc.chart');
});



// Section Pages
Route::view('/sample/error404','errors.404')->name('error404');
Route::view('/sample/error500','errors.500')->name('error500');

Route::get('/monitoring/monitor','monitoring@monitor')->name('monitor');
Route::get('/showData', 'monitoring@showData')->name('showData');

Route::get('/monitoring/monitor_bmd','monitoring@monitor_bmd')->name('monitor_bmd');
Route::get('/monitoring/monitor_ijepa','monitoring@monitor_ijepa')->name('monitor_ijepa');
Route::get('/monitoring/monitor_lcgc','monitoring@monitor_lcgc')->name('monitor_lcgc');

Route::get('history/update/{created_at}','histoController@hisUp');
Route::get('history/insert/{created_at}','histoController@viewHis');
Route::view('masterUser','masterUser');
Route::get('masterUser','showMasterController@masterUser');
Route::view('dashboard','panel.dashboard');
Route::view('history','history');
Route::get('history','histoController@index');
Route::view('/chart', 'chart');
Route::view('meta','meta');


