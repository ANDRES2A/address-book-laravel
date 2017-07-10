<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    //
    protected $primaryKey='id';
    protected $table ='contacts';

    public $timestamps=false;
}
