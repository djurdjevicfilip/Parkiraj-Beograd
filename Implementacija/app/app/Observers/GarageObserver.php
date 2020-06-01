<?php

namespace App\Observers;

use App\Garage;
use App\Events\SensorUpdated;
use App\Http\Controllers\GarageController;
class GarageObserver
{
    //On location update/create
    public function saving(Garage $garage)
    {
        $data=GarageController::garageUpdateData($garage);

        event(new SensorUpdated($data,false,false));
    }
    public function deleting(Garage $garage){
        
        
        $data=GarageController::garageUpdateData($garage);

        event(new SensorUpdated($data,true,false));
    }
   
}