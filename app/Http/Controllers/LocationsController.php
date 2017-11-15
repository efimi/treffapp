<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;

use Mail;
use App\Location;
use Carbon\Carbon;
use App\Mail\NewReservation;

class LocationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function start()
    {
        setlocale(LC_TIME, 'German');
        $today = Carbon::now()->formatLocalized('%A %d %B %Y');
        $location = null;
        return view('start', compact('location', 'today'));
    }


    public function randPlace(Request $request)
    {

        switch ($request->together) {
            case "true":
                $amount = 2;
                break;
            default:
            case "false":
                $amount = 1;
                break;
        }
        $location = Location::getPossibleLocations($amount);
        if (!empty($location)) {
            $user = Auth::user();
            if ($user->last_click != Carbon::now()->toDateString()) {
                $user->last_click = Carbon::now()->toDateString();
                $user->location_id = $location->id;
                $location->used_places += $amount;
                if ($location->save()) {
                    if ($location->used_places >= $location->max_places) {
                        Mail::to($location)->send(new NewReservation($location));
                    }
                    if ($user->save()) {
                        return view('visitors.current', compact('location'));
                    }
                }
            }
        }
        return "false";
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
