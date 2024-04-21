<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LibroCRUDController;
use App\Http\Controllers\PrestamosCRUDController;
use App\Http\Controllers\UserCRUDController;

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
    return view('dashboard');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //RUTAS PARA LIBROS
    Route::get('/addLibro', [LibroCRUDController::class, 'mostrarFormularioAdd'])->name('FormularioAddLibro'); //nombre del controlador y de la función que va a mostrar la vista
    Route::post('/addLibroPost', [LibroCRUDController::class, 'addLibro'])->name('addLibro'); 

    Route::get('/updateLibro', [LibroCRUDController::class, 'mostrarFormularioUpdate'])->name('FormularioUpdate'); 
    Route::post('/updateLibroPost', [LibroCRUDController::class, 'updateLibro'])->name('updateLibro'); 

    Route::get('/deleteLibro', [LibroCRUDController::class, 'mostrarFormularioDelete'])->name('FormularioDelete'); 
    Route::post('/deleteLibroPost', [LibroCRUDController::class, 'deleteLibro'])->name('deleteLibro'); 

    Route::get('/showLibros', [LibroCRUDController::class, 'mostrarLibros'])->name('MostrarLibros');

    //RUTAS PARA PRESTAMOS
    Route::get('/addPrestamo', [PrestamosCRUDController::class, 'mostrarFormularioAdd'])->name('FormularioAddPrestamo'); 
    Route::post('/addPrestamo', [PrestamosCRUDController::class, 'addPrestamo'])->name('addPrestamo'); 

    Route::get('updatePrestamo/{id}', [PrestamosCRUDController::class, 'mostrarFormularioUpdatePrestamo'])->name('FormularioUpdatePrestamo'); 
    Route::post('/updatePrestamoPost', [PrestamosCRUDController::class, 'updatePrestamo'])->name('updatePrestamo'); 
    Route::post('/updateFinPrestamoPost', [PrestamosCRUDController::class, 'updateFinPrestamo'])->name('updateFinPrestamo'); 

    Route::get('/deletePrestamo', [PrestamosCRUDController::class, 'mostrarFormularioDelete'])->name('FormularioDeletePrestamo'); 
    Route::post('/deletePrestamoPost', [PrestamosCRUDController::class, 'deletePrestamo'])->name('deletePrestamo');

    Route::get('/showPrestamo', [UserCRUDController::class, 'mostrarPrestamos'])->name('MostrarPrestamos');

});
