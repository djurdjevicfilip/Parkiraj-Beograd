<?php

namespace App\Http\Controllers;
use App\User;
use App\Location;
use App\ParkingLocation;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller {
   public function index() {
      $joined_locations=ParkingLocation::with(['location','sensor','garage'])->get();
      return response([$joined_locations]);
   }
}