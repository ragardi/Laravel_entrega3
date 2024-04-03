<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LibroCRUDController;
use App\Http\Controllers\PrestamosCRUDController;

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

Route::get('/home', [Controller::class, 'home'])->name('home');

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

Route::get('/updatePrestamo', [PrestamosCRUDController::class, 'mostrarFormularioUpdatePrestamo'])->name('FormularioUpdatePrestamo'); 
Route::post('/updatePrestamoPost', [PrestamosCRUDController::class, 'updatePrestamo'])->name('updatePrestamo'); 

Route::get('/deletePrestamo', [PrestamosCRUDController::class, 'mostrarFormularioDelete'])->name('FormularioDeletePrestamo'); 
Route::post('/deletePrestamoPost', [PrestamosCRUDController::class, 'deletePrestamo'])->name('deletePrestamo');

Route::get('/showPrestamo', [PrestamosCRUDController::class, 'mostrarPrestamos'])->name('MostrarPrestamos');
