<?php

use App\Http\Controllers\FuncionarioController;
use Illuminate\Support\Facades\Route;

Route::controller(FuncionarioController::class)->group(function() {
    Route::get('/funcionarios', 'index')->name('funcionarios.index');
    Route::get('/funcionarios/criar', 'create')->name('funcionarios.create');
    Route::post('/funcionarios', 'store')->name('funcionarios.store');
    Route::get('/funcionarios/editar/{id}', 'edit')->name('funcionarios.edit');
    Route::put('/funcionarios/update/{id}', 'update')->name('funcionarios.update');
    Route::delete('/funcionarios/delete/{id}', 'destroy')->name('funcionarios.destroy');
});

