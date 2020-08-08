<?php


use Illuminate\Support\Facades\Route;

    // All Task related rotues
	Route::post('add-task','TaskController@addTask');

	Route::get('all-tasks','TaskController@allTasks');

	Route::get('task-detail/{id}','TaskController@taskDetail')->name('task-detail');

	Route::post('update-task','TaskController@updateTask');

	Route::delete('delete-task/{id}','TaskController@deleteTask');

?>