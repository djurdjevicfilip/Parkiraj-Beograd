<?php

namespace App\Observers;

use App\Sensor;
use App\Events\SensorUpdated;
use App\Http\Controllers\SensorController;
class SensorObserver
{
    //On location update/create
    public function saving(Sensor $sensor)
    {
        
        $data=SensorController::sensorUpdateData($sensor);

        event(new SensorUpdated($data));
    }

}