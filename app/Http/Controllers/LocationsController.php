<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationsController extends Controller
{
    //
    public function start()
    {
      return view('start');
    }

    public function show(Location $punkt)
    {
      return view('locations.show', compact('punkt'))
    }
}
