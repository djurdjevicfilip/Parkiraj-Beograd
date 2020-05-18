<?php

namespace App\Http\Controllers;
use App\User;
use App\Location;
use App\ParkingLocation;
use Illuminate\Http\Request;
use App\Sensor;
class SensorsController extends Controller
{
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
