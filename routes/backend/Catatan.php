<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('getCatatan', 'CatatanController@getCatatan')->name('getCatatan');
Route::any('postCatatan', 'CatatanController@postCatatan')->name('postCatatan');
