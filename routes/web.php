<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProfessoresController;
use Illuminate\Support\Facades\Route;

Route::controller(FuncionarioController::class)->group(function() {
    Route::get('/funcionarios', 'index')->name('funcionarios.index');
    Route::get('/funcionarios/criar', 'create')->name('funcionarios.create');
    Route::post('/funcionarios', 'store')->name('funcionarios.store');
    Route::put('/funcionarios/update/{id}', 'update')->name('funcionarios.update');
    Route::delete('/funcionarios/delete/{id}', 'destroy')->name('funcionarios.destroy');
});

Route::controller(ProfessoresController::class)->group(function() {
    Route::get('/professores/', 'index')->name('professores.index');
    Route::get('/professores/criar', 'create')->name('professores.create');
    Route::post('/professores/', 'store')->name('professores.store');
    Route::put('/professores/atualizar/{id}', 'update')->name('professores.update');
    Route::delete('/professores/apagar/{id}', 'destroy')->name('professores.destroy');
});

