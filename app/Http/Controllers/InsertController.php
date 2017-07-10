<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulario;

class InsertController extends Controller
{
    //
    public function store(Request $request){
      $mensaje=new Formulario;
      $mensaje->nombre = $request->nombre;
      $mensaje->email = $request->email;
      $mensaje->country = $request->country;
      $mensaje->subject = $request->subject;
      $mensaje-> save();
      //return view('welcome');
    }
    public function showContact(){
      return view('contact');
    }

}
