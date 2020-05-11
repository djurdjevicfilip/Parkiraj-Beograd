<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garage extends Model
{
    // No timestamps
    public $timestamps = false;

    protected $table='garage';

    public function parkinglocation(){
        return $this->hasOne('App\ParkingLocation','idPar','idPar');
    }
    public function store($idPar,$capacity){
        $this->idPar=$idPar;
        $this->free=$capacity;
        $this->save();
    }
}
