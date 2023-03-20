<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('getCatatan', 'CatatanController@getCatatan')->name('getCatatan');
Route::post('simpanDokumen', 'UploadController@simpanDokumen')->name('simpanDokumen');
