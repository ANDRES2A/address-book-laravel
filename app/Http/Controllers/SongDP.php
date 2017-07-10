<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class SongDP extends Controller
{
    //
    public function show($genero){
      $generos=\App\Song::select('GENERO')->groupBy('GENERO')->get();
      $songs=\App\Song::where('GENERO','LIKE','%'.$genero.'%')->get();
      return $songs;
    }
    public function justShow(){
      return view('musicDinamic');
    }
}
