<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Recuperar extends Controller
{
    //
      public function show($genero){
        $songs=\App\Song::where('GENERO','LIKE','%'.$genero.'%')->get();
        return $songs;
      }
}
