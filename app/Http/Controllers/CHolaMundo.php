<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CHolaMundo extends Controller
{
    //
    public function returnGenero($pgenero)
    {
        return view('musicDinamic', array('genero' => $pgenero));
    }
    public function mostrarNombre($pnombre)
    {
        return view('musicDinamic', array('nombre' => $pnombre));
    }

}
