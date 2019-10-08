<?php

Route::get('/', function () {
    return view('index');
});

# Laravelがデフォルトで用意してるmigrationを利用したusersテーブルを利用
Route::get('/user', 'UserController@index');

Route::get('/home', 'HomeController@home');
Route::get('/upload', 'HomeController@upload');
