<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Location;
use Carbon\Carbon;

class LocationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('faq');
    }

    public function start()
    {
        Carbon::setLocale('de');
        $today = Carbon::now()->formatLocalized('%A %d %B %Y');
        $location = null;
        if (session()->get('location') != null) {
            $location = Location::find(session()->get('location'));
        }

        return view('start', compact('location', 'today'));
    }

    public function randPlace(Request $request)
    {
        if(!empty(Location::where('is_used', '=', 0)->get()->first())) {
            if ($request->together == "true") {
                $used_exist = Location::where('is_used', '=', 1)->whereRaw('used_places <= max_places - 2')->orderBy('used_places', 'DESC')->get()->first();

                if ($used_exist != null) {
                    $loc = $used_exist;

                } else {
                    $loc = Location::getNewRandom();
                    $loc->fill(['is_used' => 1])->save();
                }

                session()->put('location', $loc->id);
                $loc->fill(['used_places' => $loc->used_places + 2])->save();
            } else {
                $used_exist = Location::where('is_used', '=', 1)->whereRaw('used_places < max_places ')->orderBy('used_places', 'DESC')->get()->first();

                // TODO: All locations used if no one more free
                // TODO: Log all used in LogBook Table

                if ($used_exist != null) {
                    $loc = $used_exist;

                } else {
                    $loc = Location::getNewRandom();
                    $loc->fill(['is_used' => 1])->save();
                }

                session()->put('location', $loc->id);
                $loc->fill(['used_places' => $loc->used_places + 1])->save();
            }

        }else{
            $loc = Location::where('is_used', '=', 1)->orderBy('used_places', 'ASC')->get()->first();
            if ($request->together == "true") {
                session()->put('location', $loc->id);
                $loc->fill(['used_places' => $loc->used_places + 2])->save();
            }else{
                session()->put('location', $loc->id);
                $loc->fill(['used_places' => $loc->used_places + 1])->save();
            }

        }
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
        $weekdays = array('Montag', 'Dienstag', 'Mittwoch', 'Donnerstag', 'Freitag', 'Samstag', 'Sonntag');
        $closed = $location->closed_on;
        $closed_on = $weekdays[$closed];
        return view('locations.show', compact('location', 'closed_on'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|regex:/([a-zA-ZÄÖÜäöü\s]{0,}^[^0-9]+$)/',
            'email' => 'required|email',
            'address' => 'required|regex:/([a-zA-ZÄÖÜäöü\s]{0,}[0-9]+$)/',
        ]);

        if (!is_Null($request->file('logo')) AND $request->file('logo')->isValid()) {
            $file = $request->file('logo');
            $name = time() . $file->getClientOriginalName();
            $path = $request->file('logo')->storeAs('logos', $name);
        }
        $loc = Location::create([
            'is_used' => '0',
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'closed_on' => $request->closed_on
        ]);
        if (isset($path)) {
            $loc->logo_path = $path;
        }
        $all = Location::all();
        $success = true;
        return view('locations.index', compact('success', 'all'));
    }
}
