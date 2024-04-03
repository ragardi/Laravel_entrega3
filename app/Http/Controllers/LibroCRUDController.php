<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controllers;

class LibroCRUDController extends Controller
{
    //cada vez que se pase por el controlador va a pasar por el constructor y vamos a tener este libro inicializado
    //de esta forma el objeto va a ser el que se encarge de hacer las operaciones 
    //INYECCION DE DEPENDENCIAS
    protected $libro;
    public function __construct(Libro $libro){
        $this->libro = $libro;
    }

    public function mostrarFormularioAdd(){
        return view('addLibro'); //Nombre de la vista que queremos mostrar
    }

    public function addLibro(Request $datosEnviados){
        return $this->libro->saveLibro($datosEnviados->input('titulo'), $datosEnviados->input('autor'), $datosEnviados->input('ano_publicacion'), $datosEnviados->input('genero'), $datosEnviados->input('disponible'));
        
    }

    public function mostrarFormularioUpdate(){
        return view('updateLibro');
    }

    public function updateLibro(Request $datosEnviados){
        return $this->libro->updateLibro($datosEnviados->input('id'), $datosEnviados->input('titulo'), $datosEnviados->input('autor'), $datosEnviados->input('ano_publicacion'), $datosEnviados->input('genero'), $datosEnviados->input('disponible'));
       
    }

    public function mostrarFormularioDelete(){
        return view('deleteLibro');
    }

    public function deleteLibro(Request $datosEnviados){
        return $this->libro->deleteLibro($datosEnviados->input('id'));
    }

    public function mostrarLibros(){
        $allLibros = $this->libro->getAllLibros();
        return view('showLibro', ['libros' => $allLibros]);
    }
}
