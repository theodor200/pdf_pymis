<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    //Artisan::call('storage:link', [] );
    return view('welcome');
});

Route::get("/storage-link", function () {
    //echo public_path();
    //return Artisan::call('storage:link', [] );
    //symlink($targetFolder, $linkFolder);
});

Auth::routes(["register" => false]);

Route::get('/home', [\App\Http\Controllers\FormularioController::class,'index'])->name('home')->middleware('auth');
Route::get('/formulario/{id}',[\App\Http\Controllers\FormularioController::class,'show'])->name('documento.show')->middleware('auth');
Route::get('/formulario/crear_pdf/{id}',[\App\Http\Controllers\FormularioController::class,'create_pdf'])->name('documento.create_pdf')->middleware('auth');
Route::patch('/formulario/{id}',[\App\Http\Controllers\FormularioController::class,'update'])->name('documento.update')->middleware('auth');
Route::get('/registros',[\App\Http\Controllers\FormularioController::class,'ver_registros'])->name('ver.registros')->middleware('auth');

Route::get('/pdf/generar/{id}', [\App\Http\Controllers\FormularioController::class,'formulario_pdf_publico'])->name('formulario.generar.publico');
Route::patch('/pdf/publico/{id}', [\App\Http\Controllers\FormularioController::class,'generar_pdf_publico'])->name('documento.generar.pdf.publico');
Route::get('/pdf/generar/{documento}/{user}', [\App\Http\Controllers\FormularioController::class,'generar_pdf_admin'])->name('documento.generar.pdf.admin')->middleware('auth');
Route::delete('/pdf/eliminar/{id}', [\App\Http\Controllers\FormularioController::class,'destroy'])->name('datos.usuario.eliminar')->middleware('auth');;




