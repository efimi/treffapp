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
      Carbon::setLocale('de');
      $today = Carbon::now()->formatLocalized('%A %d %B %Y');
      $location = null;
      if(session()->get('location') != null) {
          $location = Location::find(session()->get('location'));
      }

      return view('start', compact('location','today'));
    }

    public function randPlace()
    {


      $used_exist = Location::where('is_used', true)->where('used_places','<=','3')->first();
      // TODO: All locations used if no one more free
      // TODO: Log all used in LogBook Table

      if($used_exist!=NULL){
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

      $loc->fill(['map' => view('locations.map', ['location' => $loc])->render()]);
      $loc->fill(['current' => view('visitors.current', ['location' => $loc])->render()]);
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

    public function index()
    {
        $all = Location::all();

        return view('locations.index', compact('all'));
    }
    public function edit()
    {

        return view('locations.edit');
    }
    public function show(Location $location)
    {
         $weekdays = array('Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag','Sonntag');
        $closed = $location->closed_on;
        $closed_on = $weekdays[$closed];
      return view('locations.show', compact('location','closed_on'));
    }
}
