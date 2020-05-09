<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    // No timestamps
    public $timestamps = false;

    protected $table='sensor';

    public function parkinglocation(){
        return $this->hasOne('App\ParkingLocation','idPar','idPar');
    }
    public function store($idPar){
        $this->idPar=$idPar;
        $this->free="1";
        $this->save();
    }
}
