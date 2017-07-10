<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Formulario extends Model
{
    //
    protected $primaryKey='nombre';
    protected $table ='formulario';

    public $timestamps=false;
}
