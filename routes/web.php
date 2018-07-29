<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('register', 'RegisterController@register');
Route::post('login', 'SessionController@login');
Route::get('logout', 'SessionController@logout');

Route::get('dashboard/', 'DashboardController@index')->name('dashboard');
