<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    //
    protected $primaryKey='id';
    protected $table ='songs';

    public $timestamps=false;
}
