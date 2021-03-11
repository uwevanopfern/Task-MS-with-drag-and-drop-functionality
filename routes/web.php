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
Route::post('post-sortable', 'TaskController@updateSortablePriority');

/*
|--------------------------------------------------------------------------
| Routes for ProjectController
|--------------------------------------------------------------------------
 */

Route::resource('projects', 'ProjectController');
