<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
class GarageController extends Controller
{
    //Storing garages
    public static function store($parkinglocation){
        $capacity=request('capacity');
        $garage=new Garage;
        $garage->store($parkinglocation->idPar,$capacity);
    }

}
