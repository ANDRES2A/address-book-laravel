<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class PostsController extends Controller
{
    //
    public function store(Request $request){
      $mensaje=new Posts;
      $mensaje->author = $request->author;
      $mensaje->contenido = $request->contenido;
      $mensaje->likes = $request->likes;
      $mensaje->comentario = $request->comentario;
      $mensaje-> save();
      return $mensaje->contenido;
      //return view('welcome');
    }
    public function showPostForm(){
      return view('posts');
    }
    public function like(){
      $data = Posts::all();
      $last_data_object = collect($data)->last();
      Posts::where('author','LIKE',$last_data_object->author)->increment('likes');
    }

}
