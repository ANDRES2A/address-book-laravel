<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
  protected $table = 'posts';
  protected $fillable  = ['author','contenido','likes','comentario'];
  public $timestamps=false;
}
