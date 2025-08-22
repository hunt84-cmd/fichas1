<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\EnsureUserHasRole;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/user', \App\Livewire\UsersTable::class)->name('usuarios')->middleware('role:ROLE_ADMIN');
    Route::get('/emisoras', \App\Livewire\EmisorasTable::class)->name('emisoras')->middleware('role:ROLE_ADMIN');
//    Route::get('/grupos', \App\Livewire\GruposTable::class)->name('grupos')->middleware('role:ROLE_ADMIN');
//    Route::get('/funciones', \App\Livewire\FuncionesTable::class)->name('funciones')->middleware('role:ROLE_ADMIN');
    Route::get('/tipo_programas', \App\Livewire\TipoProgramasTable::class)->name('tipo_programas')->middleware('role:ROLE_ADMIN');
    Route::get('/tipo_guiones', \App\Livewire\TipoGuionesTable::class)->name('tipo_guiones')->middleware('role:ROLE_ADMIN');
    Route::get('/clasificaciones', \App\Livewire\ClasificacionesTable::class)->name('clasificaciones')->middleware('role:ROLE_ADMIN');
    Route::get('/programas', \App\Livewire\ProgramasTable::class)->name('programas')->middleware('role:ROLE_ADMIN');
    Route::get('/programas/create', \App\Livewire\Programas\ProgramaCreatePage::class)->name('programas.create')->middleware('role:ROLE_ADMIN');
    Route::get('/programas/{id}/edit', \App\Livewire\Programas\ProgramaEditPage::class)->name('programas.edit')->middleware('role:ROLE_ADMIN');

    Route::get('/grupos',\App\Livewire\Grupos\GrupoIndex::class)->name('grupos.index')->middleware('role:ROLE_ADMIN');
    Route::get('/grupos/create',\App\Livewire\Grupos\GrupoCreate::class)->name('grupos.create')->middleware('role:ROLE_ADMIN');
    Route::get('/grupos/{grupo}/edit',\App\Livewire\Grupos\GrupoEdit::class)->name('grupos.edit')->middleware('role:ROLE_ADMIN');

    Route::get('/funciones',\App\Livewire\Funciones\FuncionesIndex::class)->name('funciones.index')->middleware('role:ROLE_ADMIN');
    Route::get('/funciones/create',\App\Livewire\Funciones\FuncionesCreate::class)->name('funciones.create')->middleware('role:ROLE_ADMIN');
    Route::get('/funciones/{grupo}/edit',\App\Livewire\Funciones\FuncionesEdit::class)->name('funciones.edit')->middleware('role:ROLE_ADMIN');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


