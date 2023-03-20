<?php

/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::post('get-permission', 'DashboardController@getPermissionByRole')->name('get.permission');
Route::get('dokumenAkreditasi', 'DashboardController@dokumenAkreditasi')->name('dokumenAkreditasi');
Route::get('simpanNilai', 'DashboardController@simpanNilai')->name('simpanNilai');

// Edit Profile
/* Route::get('profile/edit', 'DashboardController@editProfile')->name('profile.edit');
Route::patch('profile/update', 'DashboardController@updateProfile')
    ->name('profile.update'); */
