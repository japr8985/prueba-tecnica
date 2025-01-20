<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\TaskController::class)->group(function() {
    // listado de tasks
    Route::get('/', 'index')->name('tasks.index');
    // form creacion de task
    Route::get('/tasks/create', 'create')->name('tasks.create');
    // visualizacion de task concreta
    Route::get('/tasks/{task:id}', 'show')->name('tasks.show');
    // form para editar un task
    Route::get('/tasks/{task:id}/edit', 'edit')->name('tasks.edit');
    // creacion de task
    Route::post('/tasks', 'store')->name('tasks.store');
    // actualizacion de task
    Route::put('/tasks/{task:id}', 'update')->name('tasks.update');
    // eliminar task
    Route::delete('/tasks/{task:id}', 'destroy')->name('tasks.delete');
});