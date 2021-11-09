<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterielsController;
use App\Http\Controllers\AccessoiresController;

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




// Resource Route for Materiel.
Route::get('/materiels-list', [MaterielsController::class, 'index'])->name('materiels.materiels.list');
Route::post('/add-materiel', [MaterielsController::class, 'addMateriel'])->name('materiels.add.materiel');
Route::get('/getmaterielsList', [MaterielsController::class, 'getmaterielsList'])->name('materiels.get.materiels.list');
Route::post('/getMaterielsDetails', [MaterielsController::class, 'getMaterielDetails'])->name('materiels.get.materiel.details');
Route::post('/updateMaterielsDetails', [MaterielsController::class, 'updateMaterielDetails'])->name('materiels.update.materiel.details');
Route::post('/deleteMateriel', [MaterielsController::class, 'deleteMateriel'])->name('materiels.delete.materiel');
Route::post('/deleteSelectedmateriels', [MaterielsController::class, 'deleteSelectedmateriels'])->name('materiels.delete.selected.materiels');
// Resource Route for Materiel.



// Resource Route for accessoires.
Route::get('/accessoires-list', [AccessoiresController::class, 'index'])->name('accessoires.accessoires.list');
Route::post('/add-accessoire', [AccessoiresController::class, 'addAccessoire'])->name('accessoires.add.accessoire');
Route::get('/getaccessoiresList', [AccessoiresController::class, 'getaccessoiresList'])->name('accessoires.get.accessoires.list');
Route::post('/getAccessoiresDetails', [AccessoiresController::class, 'getAccessoireDetails'])->name('accessoires.get.accessoire.details');
Route::post('/updateAccessoiresDetails', [AccessoiresController::class, 'updateAccessoireDetails'])->name('accessoires.update.accessoire.details');
Route::post('/deleteAccessoire', [AccessoiresController::class, 'deleteAccessoire'])->name('accessoires.delete.accessoire');
Route::post('/deleteSelectedaccessoires', [AccessoiresController::class, 'deleteSelectedaccessoires'])->name('accessoires.delete.selected.accessoires');
// Resource Route for accessoires.


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
