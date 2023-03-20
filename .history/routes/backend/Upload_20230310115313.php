<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('upload', 'UploadController@index')->name('upload');
Route::post('simpanDokumen', 'UploadController@simpanDokumen')->name('simpanDokumen');
Route::post('ajaxEP', 'UploadController@ajaxEP')->name('ajaxEP');
