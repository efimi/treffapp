<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Carbon\Carbon;

class LocationsController extends Controller
{
    //
    public function start()
    {
      $location = null;
      if(session()->get('location') != null) {
          $location = Location::find(session()->get('location'));
      }

      return view('start', compact('location'));
    }

    public function randPlace()
    {
      $used_exist = Location::where('is_used', true)->first();

      if($used_exist!=NULL && ($used_exist->used_places <= 3)){
          $loc = $used_exist;

      }
      else {
          $loc = Location::getNewRandom();
          $loc->fill(['is_used' => 1])->save();
      }

      // TODO: Increment $loc used_places
      // TODO: save #loc and Session ID form Visitor

      session()->put('location', $loc->id);

      $loc->fill(['used_places' => $loc->used_places + 1])->save();

      return response()->json([
            'loc' => $loc
      ]);

    }
    public function myplace()
    {
      return response()->json([
          'myplace' => Location::aPlace()
        ]);
    }

    public function show(Location $punkt)
    {
      return view('locations.show', compact('punkt'));
    }
}
