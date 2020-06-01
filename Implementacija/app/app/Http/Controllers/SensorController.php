<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
/**
 * SensorController controls sensors
 * Authors: Filip Djurdjevic
 */
class SensorController extends Controller
{
    
    /**
     * Storing sensors
     * @param ParkingLocation $parkinglocation
     */
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

    /** 
     * Update random sensor(s)
     * This is used for sensor simulation
     * (The same sensor is permitted to be updated twice in this function)
     */
    public function update(){
        //Take random sensor
        $sensor=Sensor::all()->random(1)->first();
        
        //Occupy it
        $sensor->occupy();

        //Take random sensor
        $sensor=Sensor::all()->random(1)->first();
        //Free it
        $sensor->free();

    }
    /**
     * Update sensor when a car arrives
     * This is used for 
     * */
    public function occupyOnArrival(){
        $idPar=request('idPar');
        $sensor=Sensor::where('idPar',$idPar)->first();

        $sensor->occupy();

    }
    /**
     *  Get sensor data 
     * @param Sensor $sensor
     * @return array $dataMerge
     */
    public static function sensorUpdateData($sensor){
        $parkinglocation=ParkingLocation::where('idPar',$sensor->idPar)->first();
        $location=Location::where('idLoc',$parkinglocation->idLoc)->first();
        $dataA = $sensor->toArray();
        $dataB = $location->toArray();
        $dataMerge = array_merge($dataA, $dataB);
        return $dataMerge;
    }
}
