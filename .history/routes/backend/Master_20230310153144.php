<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('master', 'MasterController@index')->name('master');
Route::post('simpanBAB', 'MasterController@simpanBAB')->name('simpanBAB');
Route::post('simpanEP', 'MasterController@simpanEP')->name('simpanEP');
Route::post('simpanElemen', 'MasterController@simpanElemen')->name('simpanElemen');
