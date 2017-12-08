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
use App\Canceld;

use Carbon\Carbon;
use App\Mail\NewReservation;

class LocationsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'cancleReservation');
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

    public function randPlace($amount)
    {

        $location = Location::getPossibleLocations($amount);

        if (!empty($location)) {
            $user = Auth::user();
            $last_click = History::where('user_id', $user->id)->orderBy('date', 'asc')->first();
            if (empty($last_click) OR $last_click->date != Carbon::now()->toDateString()) {
                    $history = new History;
                    $history->user_id = $user->id;
                    $history->location_id = $location->id;
                    $history->date = Carbon::now();
                    $history->amount = $amount;
                    $history->save();

                return view('visitors.current', compact('location','amount'));
            }
        }
        return "false";
    }

    public function cancleReservation($id, $_token, $date)
    {
        $location = Location::find($id);
        if($location->token == $_token){
            //erstmal eintragen das gecanceld wurde
            $canceld = new Canceld;
            $canceld->location_id = $location->id;
            $canceld->save();
            // suche alle user aus der History aus:
            $entries = History::whereRaw('Date(date) = Date('. $date .')')->where('location_id',$id)->get();
            $entries->each(function($entry, $key){
                //weise allen neuen Place zu
                $entry->location_id = Location::getPossibleLocations($entry->amount)->id;
                $entry->save();
                //sende mails an alle User
                $user = User::find($entry->user_id);
                Mail::to($user)->send(new NewMatch($user));
            });

            // Lösche alle confirmed


            return view('cancleReservation', compact('location'));
        }
        else{
            $message = "Der Reservierungsabbruch Link ist leider ungültig";
            return view('fehler', compact('message'));
        }
    }

    public function confirmThatICome($amount)
    {
        $user = Auth::user();
        $histories = History::lastUserEntry($user, $amount);
        foreach ($histories as $history) {
            $history->confirmed = true;
            $history->save();
        }

        $location = Location::find($histories->first()->location_id);
        if ($location->used_places() >= $location->max_places) {
            Mail::to($location)->send(new NewReservation($location));
        }

        return "<p>Viel spass bei der Location. Du wurdest eingetragen</p>";
    }

    public function choseOneMoreTime($id, $_token, $date)
    {
        $user = User::find($id);

        if($user->remember_token == $_token){
            $historyToReset = History::lastUserEntry($user);
            $historyToReset->confirmed = false;
            $historyToReset->save();
            return view('start');
        }
        else{
            $message = "Der Link ist leider ungültig";
            return view('fehler', compact('message'));
        }
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
