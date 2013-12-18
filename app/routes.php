<?php

Route::get('/', 'HomeController@showHome');
Route::get('users', 'HomeController@showUsers');

// Admins
Route::get('api/admins/activated/', 'AdminController@showActivatedJSON');

// Users
Route::get('api/users/activated/', 'UserController@showActivatedJSON');
Route::get('api/users/activations/', 'UserController@showActivationsJSON');
