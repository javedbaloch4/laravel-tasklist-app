<?php

Route::get('/', 'TaskController@index')->name('/');

Route::post('/task/add','TaskController@store')->name('task.create');

Route::delete('/task/delete/{task}','TaskController@delete')->name('task.delete');
