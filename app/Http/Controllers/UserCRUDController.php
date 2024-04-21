<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Prestamos;
use App\Models\Libro;

class UserCRUDController extends Controller
{
    protected $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function mostrarPrestamos(){
        $prestamos = new Prestamos;
        $user_id = Auth::user()->id;
        $libros = Libro::all();
        $allPrestamos = $prestamos->getPrestamoUsuario($user_id)->get();
        return view('prestamos.showPrestamos', ['prestamos' => $allPrestamos, 'libros' => $libros]);
    }
}
