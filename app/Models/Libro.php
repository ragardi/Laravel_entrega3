<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    
    protected $table = 'libros';

    //RELACION PRESTAMO
    public function prestamos(){
        return $this->hasMany(Prestamos::class);
    }

    /********* BUSCAR *********/
    public function getAllLibros(){
        return Libro::all();
    }

    public function getLibroID($id){
        return Libro::find($id);
    }

    public function getLibroTitulo($titulo){
        return Libro::where('titulo', '=', $titulo);
    }

    public static function getLibroDisponible($id){
        $libro = new Libro;
        $libro = Libro::find($id);
        return $libro->disponible;
    }

    /********* INSERTAR *********/  
    public function saveLibro($titulo, $autor, $ano_publicacion, $genero, $disponible){
        $libro = new Libro;
        $libro->titulo = $titulo;
        $libro->autor= $autor;
        $libro->ano_publicacion= $ano_publicacion;
        $libro->genero= $genero;
        $libro->disponible= $disponible;

        try {
            $libro->save();
            return "OK"; 
        }
        catch(Exception $e){
            return "Error al guardar el libro";
        }
    }


    /********* ACTUALIZAR *********/  
    public function updateLibro($id, $titulo, $autor, $ano_publicacion, $genero, $disponible){
        $libro = Libro::find($id);
        
        if(isset($libro)){
            $libro->titulo = $titulo;
            $libro->autor= $autor;
            $libro->ano_publicacion= $ano_publicacion;
            $libro->genero= $genero;
            $libro->disponible= $disponible;

            $libro->save();
            return "OK"; 
        }

        return "No existe ese libro";
    }

    public static function updateEstadoLibro($id, $disponible){
        $libro = Libro::find($id);
        $libro->disponible= $disponible;

        $libro->save();
    }


    /********* BORRAR *********/  
    public function deleteLibro($id){
        $libro = Libro::find($id);
        if(isset($libro)){
            $libro->delete();
            return "OK";
        }

        return "No existe ese libro";
    }


}