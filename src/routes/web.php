<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');


# Laravelがデフォルトで用意してるmigrationを利用したusersテーブルを利用
Route::get('/user', 'UserController@index');