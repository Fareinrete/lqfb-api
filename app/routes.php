<?php

Route::group(array('prefix' => 'v1'), function(){
    Route::controller('admins', 'AdminController');
    Route::controller('users', 'UserController');
});