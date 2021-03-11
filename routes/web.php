<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Routes for TaskController
|--------------------------------------------------------------------------
 */

Route::resource('tasks', 'TaskController');
/*
|--------------------------------------------------------------------------
| Routes for ProjectController
|--------------------------------------------------------------------------
 */

Route::resource('projects', 'ProjectController');
