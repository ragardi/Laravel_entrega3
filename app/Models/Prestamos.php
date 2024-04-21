<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Libro;

class Prestamos extends Model
{
    use HasFactory;
    
    protected $table = 'prestamos';

    //RELACION USUARIO
     public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    //RELACION LIBRO
    public function libro(){
        return $this->belongsTo(Libro::class, 'book_id', 'id');
    }

    /********* BUSCAR *********/
    public function getAllPrestamos(){
        return Prestamos::all();
    }

    public function getPrestamoID($id){
        return Prestamos::find($id);
    }

    public function getPrestamoUsuario($user_id){
        return Prestamos::where("user_id", "=", $user_id);
    }

    /********* INSERTAR *********/  
    public function savePrestamo($user_id, $book_id, $fecha_prestamo){
        $disponible = Libro::getLibroDisponible($book_id);
        $dias = 15;

        if ($disponible == 1) {  
            $prestamo = new Prestamos;
            $prestamo->user_id = $user_id;
            $prestamo->book_id= $book_id;
            $prestamo->fecha_prestamo= $fecha_prestamo;
            $fecha_devolucion = date("Y-m-d", strtotime($fecha_prestamo . " + $dias days"));
            $prestamo->fecha_devolucion = $fecha_devolucion;
        
            try {
                $prestamo->save();
                Libro::updateEstadoLibro($book_id, 0);
                return redirect('/showPrestamo');
            }
            catch(Exception $e){
                return "Error al guardar el prestamo";
            }
        }

        return "Este libro no está disponible";
    }

    /********* FINALIZAR PRESTAMO *********/ 
    public function updateFinPrestamo($id, $fecha_devolucion){
        $prestamo = Prestamos::find($id);
        // dd($fecha_devolucion);
        if(isset($prestamo)){
            $prestamo->fecha_devolucion = $fecha_devolucion;

            if ($fecha_devolucion <= today()){
                Libro::updateEstadoLibro($prestamo->book_id, 1);
            }

            $prestamo->save();
            return redirect('/showPrestamo');
        }

        return "No existe ese préstamo";
    }

    /********* ACTUALIZAR *********/  
    public function updatePrestamo($id, $user_id, $fecha_prestamo, $fecha_devolucion){
        $prestamo = Prestamos::find($id);
        // dd($prestamo);
        
        if(isset($prestamo)){
            $prestamo->user_id = $user_id;
            $prestamo->fecha_prestamo= $fecha_prestamo;
            $prestamo->fecha_devolucion = $fecha_devolucion;

            if ($fecha_devolucion <= today()){
                Libro::updateEstadoLibro($prestamo->book_id, 1);
            }

            $prestamo->save();
            return redirect('/showPrestamo');
        }

        return "No existe ese préstamo";
    }


    /********* BORRAR *********/  
    public function deletePrestamo($id){
        $prestamo = Prestamos::find($id);
        if(isset($prestamo)){
            $book_id = $prestamo->book_id;
            $prestamo->delete();
            Libro::updateEstadoLibro($book_id, 1);
            return redirect('/showPrestamo');
        }

        return "No existe ese préstamo";
    }

}
