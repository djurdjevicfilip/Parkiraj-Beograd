<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParkingLocation extends Model
{
    // No timestamps
    public $timestamps = false;

    protected $table='parkinglocation';

    public function location(){
        return $this->hasOne('App\Location','idLoc','idLoc');
    }
    public function sensor(){
        return $this->belongsTo('App\Sensor','idPar','idPar');
    }
}
