<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('master', 'UploadController@index')->name('upload');
