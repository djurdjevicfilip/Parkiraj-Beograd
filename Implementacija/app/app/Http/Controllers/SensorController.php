<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
class SensorController extends Controller
{
    
    //Storing sensors 
    public static function store($parkinglocation){
        $disabled=request('disabled');
        if($disabled=="on"){
            $disabled=1;
        }else{
            $disabled=0;
        }
        $zone=request('zone');
        $sensor=new Sensor;
        $sensor->store($parkinglocation->idPar,$disabled,$zone);
    }

    /** Update random sensor(s)
     * This is used for sensor simulation
     */
    public function update(){
        \Log::debug("OCCUPY");
        //Take random sensor
        $sensor=Sensor::all()->random(1)->first();
        \Log::debug($sensor);
        //Occupy it
        $sensor->occupy();
        \Log::debug($sensor);

       \Log::debug("FREE");
        //Take random sensor
        $sensor=Sensor::all()->random(1)->first();
        //Free it
        $sensor->free();
        \Log::debug($sensor);
    }

}
