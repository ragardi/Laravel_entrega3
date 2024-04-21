<?php

namespace App\Http\Controllers;

use App\Models\Prestamos;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestamosCRUDController extends Controller
{
    protected $prestamo;
    public function __construct(Prestamos $prestamos){
        $this->prestamos = $prestamos;
    }

    public function mostrarFormularioAdd(){
        $libros = Libro::all();
        return view('prestamos.addPrestamo', ['libros' => $libros]); //Nombre de la vista que queremos mostrar
    }

    public function addPrestamo(Request $datosEnviados){
        return $this->prestamos->savePrestamo($datosEnviados->input('user_id'), $datosEnviados->input('book_id'), $datosEnviados->input('fecha_prestamo'));
    }

    public function mostrarFormularioUpdatePrestamo($id){
        $prestamo = Prestamos::find($id);
        $libros = Libro::all();
        return view('prestamos.updatePrestamo', ['prestamo' => $prestamo, 'libros' => $libros]);
    }

    public function updatePrestamo(Request $datosEnviados){
        return $this->prestamos->updatePrestamo($datosEnviados->input('id'), $datosEnviados->input('fecha_devolucion'));
       
    }
    //NUEVO
    public function updateFinPrestamo(Request $datosEnviados){
        return $this->prestamos->updateFinPrestamo($datosEnviados->input('id'), $datosEnviados->input('fecha_devolucion'));
    }


    public function mostrarFormularioDelete(){
        return view('prestamos.deletePrestamo');

    }

    public function deletePrestamo(Request $datosEnviados){
        return $this->prestamos->deletePrestamo($datosEnviados->input('id'));
    }


    // public function mostrarPrestamos(){
    //     $user_id = Auth::user()->id;
    //     $allPrestamos = Prestamos::where("user_id", "=", $user_id)->get();
    //     $libros = Libro::all();
    //     // dd($allPrestamos);
    //     return view('prestamos.showPrestamos', ['prestamos' => $allPrestamos, 'libros' => $libros]);
    // }
}
