<?php

// Admins
Route::get('api/admins/activated/', 'AdminController@showActivatedJSON');

// Users
Route::get('api/users/activated/', 'UserController@showActivatedJSON');
Route::get('api/users/activations/', 'UserController@showActivationsJSON');
Route::get('api/users/lastlogin/', 'UserController@showLastLoginJSON');
