<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    public $timestamps = false;
    
    protected $table='administrative';
    public $primaryKey='idUser';

    public function store($idUser){
        $this->idUser=$idUser;
        $this->isAdmin=0;
        $this->save();
    }

    public function activate(){
        $this->active=1;
        $this->save();
    }
}
