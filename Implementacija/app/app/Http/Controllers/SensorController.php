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
    //Update sensor when a car arrives
    public function occupyOnArrival(){
        $idPar=request('idPar');
        $sensor=Sensor::where('idPar',$idPar)->first();

        $sensor->occupy();

    }
    /** Get sensor data 
     * (for now)
     */
    public static function sensorUpdateData($subclass){
        $parkinglocation=ParkingLocation::where('idPar',$subclass->idPar)->first();
        $location=Location::where('idLoc',$parkinglocation->idLoc)->first();
        $dataA = $subclass->toArray();
        $dataB = $location->toArray();
        $dataMerge = array_merge($dataA, $dataB);
        return $dataMerge;
    }
}
