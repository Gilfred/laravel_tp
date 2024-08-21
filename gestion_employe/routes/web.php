<?php

use App\Http\Controllers\EmployeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [EmployeController::class, 'create'])->name('creation.employe');
Route::post('/', [EmployeController::class, 'store'])->name('enregistrement');
Route::get('ressource', [EmployeController::class, 'index'])->name('affichage.ressources');
Route::delete('suppression/{id}', [EmployeController::class, 'destroy'])->name('employes.supprimes');

//modification
Route::get('edit/{id}/edit', [EmployeController::class, 'edit'])->name('employe.edit');
Route::put('msj/{id}', [EmployeController::class, 'update'])->name('rectification');
