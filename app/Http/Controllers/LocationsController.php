<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;

use Mail;
use App\Location;
use App\History;
use Carbon\Carbon;
use App\Mail\NewReservation;

class LocationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'tescht');
    }

    public function start()
    {

        setlocale(LC_TIME, 'de_DE');
        setlocale(LC_TIME, 'German');

        $today = Carbon::now()->formatLocalized('%A %d. %B %Y');
        $location = null;
        return view('start', compact('location', 'today'));
    }


    public function tescht()
    {
        $request = new \Illuminate\Http\Request();
        $request->replace([
            'together' => "true"
        ]);

        $this->randPlace($request);
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
            $last_click = History::where('user_id', $user->id)->orderBy('date', 'asc')->first();
            if (empty($last_click) OR $last_click->date != Carbon::now()->toDateString()) {
                if ($location->used_places() >= $location->max_places) {
                    Mail::to($location)->send(new NewReservation($location));
                }
                $history = new History;
                $history->user_id = $user->id;
                $history->location_id = $request->location_id;
                $history->date = Carbon::now();
                $history->save();
                return view('visitors.current', compact('location'));
            }
        }
        return "false";
    }
    public function confirmThatICome(Request $request)
    {
        $user = Auth::user();
        $history = new History;
        $history->user_id = $user->id;
        $history->location_id = $request->location_id;
        $history->date = Carbon::now();
        $history->confirmed = ture;
        $history->save();
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
