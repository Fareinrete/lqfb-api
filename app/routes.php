<?php

Route::get('/', 'HomeController@showHome');
Route::get('users', 'HomeController@showUsers');
Route::get('api/users/activated/', 'UserController@showActivatedJSON');