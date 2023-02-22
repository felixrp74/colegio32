<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ReporteEstudianteController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\CursoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function(){
    return view('welcome');
});

Route::resource('estudiante', EstudianteController::class);
Route::resource('docente', DocenteController::class);
Route::resource('grado', GradoController::class);
Route::resource('matricula', MatriculaController::class);
Route::resource('reportenotas', ReporteEstudianteController::class);
Route::resource('asignacion', AsignacionController::class);
Route::resource('curso', CursoController::class);
