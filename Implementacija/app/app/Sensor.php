<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    // No timestamps
    public $timestamps = false;

    protected $table='sensor';

    public $primaryKey='idPar';
    

    public function parkinglocation(){
        return $this->hasOne('App\ParkingLocation','idPar','idPar');
    }
    public function store($idPar,$disabled,$zone){
        $this->idPar=$idPar;
        $this->Free="1";
        $this->disabled=$disabled;
        $this->zone=$zone;
        $this->save();
    }
    public function occupy(){
        $this->Free="0";
        $this->save();
    }
    public function free(){
        $this->Free="1";
        $this->save();
    }
}
