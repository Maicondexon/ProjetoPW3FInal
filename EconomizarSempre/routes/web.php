<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FinancasController;


Route::put('/ganhos/{id}', 'FinancasController@updateGanhos')->name('Ganhos.update');
Route::delete('/ganhos/{id}', 'FinancasController@destroyGanhos')->name('Ganhos.destroy');

Route::get('/financas', [FinancasController::class, 'index'])->name('financas');
Route::post('/Ganhos', [FinancasController::class, 'storeGanhos'])->name('Ganhos.store');
Route::post('/Gastos', [FinancasController::class, 'storeGastos'])->name('Gastos.store');
Route::post('/GanhosRecorrentes', [FinancasController::class, 'storeGanhosRecorrentes'])->name('GanhosRecorrentes.store');

Route::put('/Ganhos/{id}', [FinancasController::class, 'updateGanhos'])->name('Ganhos.update');
Route::put('/Gastos/{id}', [FinancasController::class, 'updateGastos'])->name('Gastos.update');
Route::put('/GanhosRecorrentes/{id}', [FinancasController::class, 'updateGanhosRecorrentes'])->name('GanhosRecorrentes.update');

Route::delete('/ganhos/{id}', [FinancasController::class, 'destroyGanhos'])->name('Ganhos.destroy');
Route::delete('/gastos/{id}', [FinancasController::class, 'destroyGastos'])->name('Gastos.destroy');
Route::delete('/GanhosRecorrentes/{id}', [FinancasController::class, 'destroyGanhosRecorrentes'])->name('GanhosRecorrentes.destroy');

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
