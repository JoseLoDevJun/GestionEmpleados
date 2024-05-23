<?php

use App\Http\Controllers\{
    UsuarioController,DepartamentoController, 
    EmpleadoController, PanelPrincipalController
};

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');

Route::resource('empleados', EmpleadoController::class);
Route::resource('departamentos', DepartamentoController::class);
Route::resource('usuarios', UsuarioController::class);
Route::get('/panel-principal', [PanelPrincipalController::class, 'index'])->name('panel-principal');