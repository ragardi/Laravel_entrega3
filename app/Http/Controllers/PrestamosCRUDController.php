<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use Illuminate\Http\Request;

class PrestamosCRUDController extends Controller
{
    protected $prestamo;
    public function __construct(Prestamos $prestamos){
        $this->prestamos = $prestamos;
    }

    public function mostrarFormularioAdd(){
        return view('addPrestamo'); //Nombre de la vista que queremos mostrar
    }

    public function addPrestamo(Request $datosEnviados){
        return $this->prestamos->savePrestamo($datosEnviados->input('user_id'), $datosEnviados->input('book_id'), $datosEnviados->input('fecha_prestamo'));
    }

    public function mostrarFormularioUpdatePrestamo(){
        return view('updatePrestamo');
    }

    public function updatePrestamo(Request $datosEnviados){
        return $this->prestamos->updatePrestamo($datosEnviados->input('id'), $datosEnviados->input('user_id'), $datosEnviados->input('fecha_prestamo'), $datosEnviados->input('fecha_devolucion'));
       
    }


    public function mostrarFormularioDelete(){
        return view('deletePrestamo');
    }

    public function deletePrestamo(Request $datosEnviados){
        return $this->prestamos->deletePrestamo($datosEnviados->input('id'));
    }


    public function mostrarPrestamos(){
        $allPrestamos = $this->prestamos->getAllPrestamos();
        return view('showPrestamos', ['prestamos' => $allPrestamos]);
    }
}
