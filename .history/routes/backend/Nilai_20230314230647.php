<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('nilai', 'NilaiController@index')->name('nilai');
Route::get('/getNilai', 'NilaiController@getNilai')->name('getNilai');
Route::get('/getDocument', 'NilaiController@getDocument')->name('getDocument');

