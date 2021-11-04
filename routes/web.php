<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterielsController;

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
    return view('welcome');
});


/* Materiel */
Route::get('/materiel', [MaterielsController::class, 'index'])->name('materiel.index');
Route::get('/materiel/{id}', [MaterielsController::class, 'show'])->name('materiel.show');
Route::get('/create/materiel', [MaterielsController::class, 'create'])->name('materiel.create');
Route::post('/add/materiel', [MaterielsController::class, 'store'])->name('materiel.store');
Route::get('/edit/materiel/{id}', [MaterielsController::class, 'edit'])->name('materiel.edit');
Route::put('/update/materiel/{id}', [MaterielsController::class, 'update'])->name('materiel.update');
Route::delete('/delete/materiel/{id}', [MaterielsController::class, 'delete'])->name('materiel.delete');
Route::delete('/destroy/materiel/{id}', [MaterielsController::class, 'destroy'])->name('materiel.destroy');
Route::get('/restore/materiel/{id}', [MaterielsController::class, 'restore'])->name('materiel.restore');
/* Materiel */




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
