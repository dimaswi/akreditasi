<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('master', 'MasterController@index')->name('master');
Route::get('ajaxListBAB', 'MasterController@ajaxBAB')->name('ajaxListBAB');
Route::get('ajaxListStandar', 'MasterController@ajaxStandar')->name('ajaxListStandar');
Route::get('ajaxListEP', 'MasterController@ajaxEP')->name('ajaxListEP');
Route::post('simpanBAB', 'MasterController@simpanBAB')->name('simpanBAB');
Route::post('simpanEP', 'MasterController@simpanEP')->name('simpanEP');
Route::post('simpanElemen', 'MasterController@simpanElemen')->name('simpanElemen');
Route::any('editBab', 'MasterController@editBab')->name('editBab');
Route::any('editEP', 'MasterController@editEP')->name('editEP');
Route::any('editStandar', 'MasterController@editStandar')->name('editStandar');
Route::any('hapusBAB', 'MasterController@hapusBAB')->name('hapusBAB');
Route::any('hapusStandart', 'MasterController@hapusStandart')->name('hapusStandart');
