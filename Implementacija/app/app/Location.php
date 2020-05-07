<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // No timestamps
    public $timestamps = false;

    protected $table='location';

    public function parkinglocation(){
        return $this->belongsTo('App\ParkingLocation','idLoc','idLoc');
    }
}
