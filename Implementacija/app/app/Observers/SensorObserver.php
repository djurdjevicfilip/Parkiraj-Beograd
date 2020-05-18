<?php

namespace App\Observers;

use App\Sensor;
use App\Events\LocationUpdated;
use App\Http\Controllers\LocationsController;
class SensorObserver
{
    //On location update/create
    public function saving(Sensor $location)
    {
        
        $data=LocationsController::newLocationData($location);

        event(new LocationUpdated($data));
        \Log::debug('CREATED');
    }

}