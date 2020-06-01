<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ParkingLocation;
use App\Location;
use App\Sensor;
use App\Garage;
/**
 * Author: Danilo Dabovic & Filip Djurdjevic
 */
class GarageController extends Controller
{
    /**
     * Storing garages
     * @param parkinglocation
     */
    public static function store($parkinglocation){
        $capacity=request('capacity');
        $garage=new Garage;
        $garage->store($parkinglocation->idPar,$capacity);
    }
    /**
     * Get Garage Data
     * @param Garage $garage
     * @return array $dataMerge
     */
    public static function garageUpdateData($garage){
        $parkinglocation=ParkingLocation::where('idPar',$garage->idPar)->first();
        $location=Location::where('idLoc',$parkinglocation->idLoc)->first();
        $dataA = $garage->toArray();
        $dataB = $location->toArray();
        $dataMerge = array_merge($dataA, $dataB);
        return $dataMerge;
    }
}
