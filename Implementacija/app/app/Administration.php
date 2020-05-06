<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    public $timestamps = false;
    
    protected $table='administrative';
    public $primaryKey='idUser';

    
}
